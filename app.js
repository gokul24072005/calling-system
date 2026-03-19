// ==================== STATE ====================
let currentUser = null;
let selectedRole = 'admin';
let refreshInterval = null;
let charts = {}; // store chart instances

// ==================== INIT ====================
window.onload = () => {
    selectRole('admin');
    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark');
        document.getElementById('darkModeIcon').classList.replace('fa-moon', 'fa-sun');
    }
};

// ==================== AUTH ====================
function selectRole(role) {
    selectedRole = role;
    document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('active'));
    document.getElementById(`role-${role}-btn`).classList.add('active');
}

document.getElementById('login-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    try {
        const res = await fetch('api/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, password, role: selectedRole })
        });
        const data = await res.json();
        if (!res.ok) throw new Error(data.error || 'Login failed');

        currentUser = data.user;
        document.getElementById('login-container').classList.add('hidden');
        document.getElementById('dashboard-container').classList.remove('hidden');
        initDashboard();
        showToast(`Welcome, ${currentUser.name}!`, 'success');
    } catch (err) {
        alert(err.message);
    }
});

async function logout() {
    await fetch('api/logout.php', { method: 'POST' });
    location.reload();
}

// ==================== DASHBOARD INIT ====================
async function initDashboard() {
    document.getElementById('user-name').textContent = currentUser.name;
    document.getElementById('user-role').textContent = currentUser.role.toUpperCase();

    renderSidebar();
    await loadDashboardData(); // initial load
    startRealtimeUpdates();
}

function renderSidebar() {
    const nav = document.getElementById('sidebar-nav');
    let html = `
        <a onclick="showDashboardHome()" class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-slate-800 cursor-pointer text-slate-300">
            <i class="fa-solid fa-house w-5"></i><span>Dashboard</span>
        </a>
    `;

    if (currentUser.role === 'admin' || currentUser.role === 'manager') {
        html += `
            <a onclick="showEmployees()" class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-slate-800 cursor-pointer text-slate-300">
                <i class="fa-solid fa-users w-5"></i><span>Team</span>
            </a>
        `;
    }

    if (currentUser.role === 'admin') {
        html += `
            <a onclick="showAssignTaskModal()" class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-slate-800 cursor-pointer text-slate-300">
                <i class="fa-solid fa-plus w-5"></i><span>Assign Lead</span>
            </a>
        `;
    }

    if (currentUser.role !== 'employee') {
        html += `
            <a onclick="showReports()" class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-slate-800 cursor-pointer text-slate-300">
                <i class="fa-solid fa-chart-pie w-5"></i><span>Reports</span>
            </a>
        `;
    }

    nav.innerHTML = html;
}

// ==================== DATA LOADING ====================
async function loadDashboardData() {
    try {
        const res = await fetch('api/get_dashboard.php');
        const data = await res.json();
        if (!res.ok) throw new Error(data.error);

        // Route to appropriate view based on role
        if (currentUser.role === 'admin') showAdminDashboard(data);
        else if (currentUser.role === 'manager') showManagerDashboard(data);
        else showEmployeeDashboard(data);
    } catch (err) {
        showToast(err.message, 'error');
    }
}

function startRealtimeUpdates() {
    if (refreshInterval) clearInterval(refreshInterval);
    if (currentUser.role !== 'employee') { // managers and admins get live updates
        refreshInterval = setInterval(loadDashboardData, 10000);
    }
}

// ==================== VIEWS ====================
function showDashboardHome() {
    document.getElementById('page-title').textContent = 'Overview';
    loadDashboardData(); // reload
}

function showAdminDashboard(data) {
    document.getElementById('page-title').textContent = 'Admin Dashboard';
    const stats = data.leadStats || {};
    const html = `
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="glass rounded-3xl p-8">
                <p class="text-slate-400 text-sm">Total Employees</p>
                <p class="text-6xl font-bold mt-3">${data.employees.length}</p>
            </div>
            <div class="glass rounded-3xl p-8">
                <p class="text-slate-400 text-sm">Total Leads</p>
                <p class="text-6xl font-bold mt-3">${Object.values(stats).reduce((a,b)=>a+b,0)}</p>
            </div>
            <div class="glass rounded-3xl p-8">
                <p class="text-slate-400 text-sm">Interested</p>
                <p class="text-6xl font-bold mt-3 text-emerald-400">${stats.interested || 0}</p>
            </div>
            <div class="glass rounded-3xl p-8">
                <p class="text-slate-400 text-sm">Pending</p>
                <p class="text-6xl font-bold mt-3 text-amber-400">${stats.pending || 0}</p>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="glass rounded-3xl p-8">
                <h3 class="text-xl font-semibold mb-6">Lead Status Distribution</h3>
                <canvas id="statusChart" class="h-80"></canvas>
            </div>
            <div class="glass rounded-3xl p-8">
                <h3 class="text-xl font-semibold mb-6">Employee Performance</h3>
                <canvas id="teamChart" class="h-80"></canvas>
            </div>
        </div>
    `;
    document.getElementById('main-content').innerHTML = html;

    // Destroy old charts if any
    if (charts.status) charts.status.destroy();
    if (charts.team) charts.team.destroy();

    // Status pie chart
    charts.status = new Chart(document.getElementById('statusChart'), {
        type: 'pie',
        data: {
            labels: ['Pending', 'Interested', 'Not Interested', 'Call Later', 'Completed'],
            datasets: [{
                data: [
                    stats.pending || 0,
                    stats.interested || 0,
                    stats.not_interested || 0,
                    stats.call_later || 0,
                    stats.completed || 0
                ],
                backgroundColor: ['#64748b', '#10b981', '#ef4444', '#f59e0b', '#3b82f6']
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    // Team bar chart
    const empNames = data.employees.map(e => e.name);
    const totalCalls = data.employees.map(e => parseInt(e.totalCalls) || 0);
    charts.team = new Chart(document.getElementById('teamChart'), {
        type: 'bar',
        data: {
            labels: empNames,
            datasets: [{
                label: 'Total Calls',
                data: totalCalls,
                backgroundColor: '#22d3ee'
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
    });
}

function showManagerDashboard(data) {
    document.getElementById('page-title').textContent = 'Team Overview';
    let html = `<div class="grid grid-cols-1 lg:grid-cols-2 gap-8" id="manager-grid"></div>`;
    document.getElementById('main-content').innerHTML = html;
    renderManagerGrid(data.employees);
}

function renderManagerGrid(employees) {
    const grid = document.getElementById('manager-grid');
    grid.innerHTML = '';
    employees.forEach(emp => {
        grid.innerHTML += `
            <div class="glass rounded-3xl p-8">
                <div class="flex items-center gap-4">
                    <div class="text-5xl">📞</div>
                    <div class="flex-1">
                        <h4 class="text-2xl font-semibold">${emp.name}</h4>
                        <p class="text-cyan-400 text-sm">${emp.email}</p>
                    </div>
                </div>
                <div class="mt-10 flex justify-between text-sm">
                    <div>
                        <p class="text-slate-400">Calls Made</p>
                        <p class="text-4xl font-bold">${emp.totalCalls || 0}</p>
                    </div>
                    <div>
                        <p class="text-slate-400">Interested</p>
                        <p class="text-4xl font-bold text-emerald-400">${emp.interested || 0}</p>
                    </div>
                    <div>
                        <p class="text-slate-400">Pending</p>
                        <p class="text-4xl font-bold text-amber-400">${emp.pending || 0}</p>
                    </div>
                </div>
                <div class="mt-8 h-2 bg-slate-800 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-cyan-400 to-emerald-400" style="width: ${emp.totalCalls ? Math.min(100, (emp.interested/emp.totalCalls)*100) : 0}%"></div>
                </div>
            </div>
        `;
    });
}

function showEmployeeDashboard(data) {
    document.getElementById('page-title').textContent = 'My Leads';
    let html = `<div id="employee-leads" class="space-y-6"></div>`;
    document.getElementById('main-content').innerHTML = html;
    renderEmployeeLeads(data.myLeads);
}

function renderEmployeeLeads(leads) {
    const container = document.getElementById('employee-leads');
    container.innerHTML = '';

    if (!leads || leads.length === 0) {
        container.innerHTML = `<div class="text-center py-20 text-slate-400">No leads assigned yet.</div>`;
        return;
    }

    leads.forEach(lead => {
        let statusHTML = '';
        if (lead.status === 'pending') {
            statusHTML = `<button onclick="startCall(${lead.id})" class="bg-gradient-to-r from-cyan-500 to-blue-600 px-8 py-3 rounded-2xl font-semibold">📞 Call Now</button>`;
        } else {
            statusHTML = `<span class="px-6 py-3 bg-emerald-900 text-emerald-400 rounded-2xl text-sm font-medium">${lead.status.toUpperCase().replace('_', ' ')}</span>`;
        }

        container.innerHTML += `
            <div class="glass rounded-3xl p-8 task-card">
                <div class="flex justify-between">
                    <div>
                        <h4 class="text-2xl font-semibold">${lead.client_name}</h4>
                        <p class="text-slate-400">${lead.client_phone} • ${lead.client_email}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-slate-400">Due</p>
                        <p class="font-medium">${lead.due_date}</p>
                    </div>
                </div>
                <p class="mt-6 text-slate-300">${lead.description}</p>
                <div class="mt-8 flex items-center gap-4">
                    ${statusHTML}
                    <button onclick="showNotesModal(${lead.id})" class="px-6 py-3 border border-slate-600 rounded-2xl hover:bg-slate-800">Add Notes</button>
                </div>
            </div>
        `;
    });
}

// ==================== EMPLOYEE ACTIONS ====================
function startCall(leadId) {
    // Fetch lead details (we can pass from existing data, but for simplicity we'll show modal with call options)
    const modalContent = `
        <div class="text-center py-8">
            <div class="mx-auto w-24 h-24 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-full flex items-center justify-center text-6xl mb-8 animate-pulse">📞</div>
            <h3 class="text-3xl font-bold mb-2">Calling...</h3>
            <p class="text-slate-400">Lead ID: ${leadId}</p>
            <div class="mt-12 flex gap-4 justify-center flex-wrap">
                <button onclick="updateLeadStatus(${leadId}, 'interested')" class="bg-emerald-600 hover:bg-emerald-700 px-6 py-3 rounded-2xl text-lg">Interested</button>
                <button onclick="updateLeadStatus(${leadId}, 'not_interested')" class="bg-red-600 hover:bg-red-700 px-6 py-3 rounded-2xl text-lg">Not Interested</button>
                <button onclick="updateLeadStatus(${leadId}, 'call_later')" class="bg-amber-600 hover:bg-amber-700 px-6 py-3 rounded-2xl text-lg">Call Later</button>
                <button onclick="updateLeadStatus(${leadId}, 'completed')" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-2xl text-lg">Completed</button>
            </div>
        </div>
    `;
    showModal(modalContent);
}

async function updateLeadStatus(leadId, newStatus) {
    const notes = prompt('Add notes (optional):') || '';
    try {
        const res = await fetch('api/leads.php', {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: leadId, status: newStatus, notes })
        });
        const data = await res.json();
        if (!res.ok) throw new Error(data.error);
        closeModal();
        showToast('Status updated!', 'success');
        loadDashboardData(); // refresh
    } catch (err) {
        showToast(err.message, 'error');
    }
}

function showNotesModal(leadId) {
    const modalContent = `
        <h3 class="text-2xl font-semibold mb-6">Add Notes</h3>
        <textarea id="lead-notes" class="w-full h-48 bg-slate-900 border border-slate-700 rounded-3xl p-6 outline-none"></textarea>
        <div class="mt-8 flex gap-4">
            <button onclick="saveNotes(${leadId})" class="flex-1 bg-cyan-500 py-4 rounded-2xl font-semibold">Save Notes</button>
            <button onclick="closeModal()" class="flex-1 bg-slate-800 py-4 rounded-2xl font-semibold">Cancel</button>
        </div>
    `;
    showModal(modalContent);
}

async function saveNotes(leadId) {
    const notes = document.getElementById('lead-notes').value.trim();
    try {
        const res = await fetch('api/leads.php', {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: leadId, status: 'pending', notes }) // keep same status
        });
        if (!res.ok) throw new Error('Failed to save notes');
        closeModal();
        showToast('Notes saved!', 'success');
        loadDashboardData();
    } catch (err) {
        showToast(err.message, 'error');
    }
}

// ==================== ADMIN ACTIONS ====================
async function showEmployees() {
    document.getElementById('page-title').textContent = 'Team Members';
    try {
        const res = await fetch('api/users.php');
        const employees = await res.json();
        let html = `
            <div class="flex justify-between mb-8">
                <h2 class="text-3xl font-semibold">Team Directory</h2>
                ${currentUser.role === 'admin' ? `<button onclick="showAddEmployeeModal()" class="bg-cyan-500 hover:bg-cyan-600 px-8 py-3 rounded-2xl font-medium flex items-center gap-2"><i class="fa-solid fa-user-plus"></i> Add Telecaller</button>` : ''}
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" id="employees-grid"></div>
        `;
        document.getElementById('main-content').innerHTML = html;
        renderEmployeesGrid(employees);
    } catch (err) {
        showToast(err.message, 'error');
    }
}

function renderEmployeesGrid(employees) {
    const grid = document.getElementById('employees-grid');
    grid.innerHTML = '';
    employees.forEach(emp => {
        grid.innerHTML += `
            <div class="glass rounded-3xl p-8 task-card">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="text-2xl font-semibold">${emp.name}</h4>
                        <p class="text-slate-400">${emp.email}</p>
                    </div>
                    ${currentUser.role === 'admin' ? `<button onclick="removeEmployee(${emp.id})" class="text-red-400 hover:text-red-500"><i class="fa-solid fa-trash"></i></button>` : ''}
                </div>
            </div>
        `;
    });
}

function showAddEmployeeModal() {
    const modalContent = `
        <h3 class="text-2xl font-semibold mb-6">Add New Telecaller</h3>
        <input id="new-name" placeholder="Full Name" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mb-4 outline-none">
        <input id="new-username" placeholder="Username" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mb-4 outline-none">
        <input id="new-email" type="email" placeholder="Email Address" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mb-8 outline-none">
        <div class="flex gap-4">
            <button onclick="addNewEmployee()" class="flex-1 bg-cyan-500 hover:bg-cyan-600 py-4 rounded-2xl font-semibold">Add Employee</button>
            <button onclick="closeModal()" class="flex-1 bg-slate-800 hover:bg-slate-700 py-4 rounded-2xl font-semibold">Cancel</button>
        </div>
    `;
    showModal(modalContent);
}

async function addNewEmployee() {
    const name = document.getElementById('new-name').value.trim();
    const username = document.getElementById('new-username').value.trim();
    const email = document.getElementById('new-email').value.trim();

    if (!name || !username || !email) return showToast('All fields required', 'error');

    try {
        const res = await fetch('api/users.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, username, email })
        });
        const data = await res.json();
        if (!res.ok) throw new Error(data.error);
        closeModal();
        showToast(`Employee added! Password: ${data.generated_password}`, 'success');
        showEmployees();
    } catch (err) {
        showToast(err.message, 'error');
    }
}

async function removeEmployee(id) {
    if (!confirm('Remove this telecaller?')) return;
    try {
        const res = await fetch(`api/users.php?id=${id}`, { method: 'DELETE' });
        if (!res.ok) throw new Error('Failed to remove');
        showToast('Employee removed', 'success');
        showEmployees();
    } catch (err) {
        showToast(err.message, 'error');
    }
}

function showAssignTaskModal() {
    // Fetch employees list for dropdown
    fetch('api/users.php')
        .then(res => res.json())
        .then(employees => {
            const options = employees.map(e => `<option value="${e.id}">${e.name}</option>`).join('');
            const modalContent = `
                <h3 class="text-2xl font-semibold mb-6">Assign New Lead</h3>
                <select id="assign-to" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mb-4 outline-none">${options}</select>
                <input id="client-name" placeholder="Client Name" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mb-4 outline-none">
                <input id="client-phone" placeholder="Phone Number" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mb-4 outline-none">
                <input id="client-email" placeholder="Email" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mb-4 outline-none">
                <textarea id="description" placeholder="Task / Lead Description" class="w-full bg-slate-900 border border-slate-700 rounded-3xl px-6 py-4 h-28 outline-none"></textarea>
                <input id="due-date" type="date" class="w-full bg-slate-900 border border-slate-700 rounded-2xl px-6 py-4 mt-4 outline-none">
                <div class="flex gap-4 mt-8">
                    <button onclick="assignLead()" class="flex-1 bg-cyan-500 py-4 rounded-2xl font-semibold">Assign Lead</button>
                    <button onclick="closeModal()" class="flex-1 bg-slate-800 py-4 rounded-2xl font-semibold">Cancel</button>
                </div>
            `;
            showModal(modalContent);
        })
        .catch(err => showToast(err.message, 'error'));
}

async function assignLead() {
    const assigned_to = parseInt(document.getElementById('assign-to').value);
    const client_name = document.getElementById('client-name').value.trim();
    const client_phone = document.getElementById('client-phone').value.trim();
    const client_email = document.getElementById('client-email').value.trim();
    const description = document.getElementById('description').value.trim();
    const due_date = document.getElementById('due-date').value;

    if (!client_name || !client_phone) return showToast('Client name & phone required', 'error');

    try {
        const res = await fetch('api/leads.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ assigned_to, client_name, client_phone, client_email, description, due_date })
        });
        if (!res.ok) throw new Error('Failed to assign');
        closeModal();
        showToast('Lead assigned!', 'success');
        loadDashboardData();
    } catch (err) {
        showToast(err.message, 'error');
    }
}

// ==================== REPORTS ====================
function showReports() {
    document.getElementById('page-title').textContent = 'Reports';
    const html = `
        <div class="glass rounded-3xl p-8 text-center">
            <h3 class="text-2xl font-semibold mb-6">Export Lead Data</h3>
            <p class="mb-8 text-slate-400">Download a CSV report of all leads with employee assignments.</p>
            <a href="api/reports.php?export=csv" class="bg-cyan-500 hover:bg-cyan-600 px-10 py-4 rounded-2xl inline-flex items-center gap-3">
                <i class="fa-solid fa-download"></i> Download CSV
            </a>
        </div>
    `;
    document.getElementById('main-content').innerHTML = html;
}

// ==================== UTILITIES ====================
function showModal(content) {
    document.getElementById('modal-content').innerHTML = content;
    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

function showToast(message, type = 'info') {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');
    // Set color based on type
    toast.style.backgroundColor = type === 'error' ? '#b91c1c' : type === 'success' ? '#065f46' : '#1e293b';
    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

function toggleDarkMode() {
    document.body.classList.toggle('dark');
    const isDark = document.body.classList.contains('dark');
    localStorage.setItem('darkMode', isDark);
    const icon = document.getElementById('darkModeIcon');
    if (isDark) {
        icon.classList.replace('fa-moon', 'fa-sun');
    } else {
        icon.classList.replace('fa-sun', 'fa-moon');
    }
}
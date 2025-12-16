@extends('layouts.app')
@section('contant')

<div id="performance">
    <h2 class="mb-4">📊 Student Performance Analysis</h2>

    <div class="container">
        <div class="row" id="statCards">
        </div>
         <hr>

        <select id="filter" class="form-select w-25 mb-4">
            <option value="weekly">Weekly</option>
            <option value="monthly" selected>Monthly</option>
            <option value="yearly">Yearly</option>
        </select>

        {{-- CHART --}}
        <canvas id="performanceChart" height="120"></canvas>

        {{-- INDIVIDUAL SCORES --}}
        <div class="row mt-4" id="scoreCards"></div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
function renderStatCards(item) {

    const cards = [
        {
            key: 'academic_performance',
            label: 'Academic Performance',
            icon: 'fa-book-open',
            color: 'text-primary'
        },
        {
            key: 'consistency',
            label: 'Consistency',
            icon: 'fa-chart-line',
            color: 'text-success'
        },
        {
            key: 'class_engagement',
            label: 'Class Engagement',
            icon: 'fa-users',
            color: 'text-info'
        },
        {
            key: 'subject_understanding',
            label: 'Subject Understanding',
            icon: 'fa-brain',
            color: 'text-warning'
        },
        {
            key: 'test_preparedness',
            label: 'Test Preparedness',
            icon: 'fa-clipboard-check',
            color: 'text-danger'
        },
        {
            key: 'participation_in_sports',
            label: 'Sports Participation',
            icon: 'fa-football-ball',
            color: 'text-success'
        },
        {
            key: 'motivation_level',
            label: 'Motivation Level',
            icon: 'fa-bolt',
            color: 'text-warning'
        }
    ];

    const container = document.getElementById('statCards');
    container.innerHTML = '';

    cards.forEach(card => {
        console.log(item)
        const value = parseFloat(item[0][card.key] ?? 0).toFixed(1);

        container.innerHTML += `
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stat-card shadow-sm">
                    <div class="card-body text-center">
                        <div class="stat-icon ${card.color}">
                            <i class="fas ${card.icon} fa"></i>
                        </div>
                        <div class="stat-value fs-3 fw-bold mt-2">${value}/10</div>
                        <div class="stat-label text-muted">${card.label}</div>
                    </div>
                </div>
            </div>
        `;
    });
}
</script>



<script>
let chart = null;




function loadChart(type) {
    fetch(`{{ route('student.performance.data') }}?type=${type}`)
        .then(res => res.json())
        .then(data => {

            if (!data || data.length === 0) {
                alert('No data found');
                return;
            }
             renderStatCards(data);

            const item = data[0]; // because monthly/yearly avg
            const labels = data.map(d => d.date);

            // 📊 GRAPH DATA
            const academic = data.map(d => d.academic_performance);
            const maths    = data.map(d => d.maths);
            const science  = data.map(d => d.science);
            const english  = data.map(d => d.english);

            const canvas = document.getElementById('performanceChart');
            if (chart) chart.destroy();

            chart = new Chart(canvas, {
                type: 'line',
                data: {
                    labels,
                    datasets: [
                        { label: 'Academic', data: academic },
                        { label: 'Maths', data: maths },
                        { label: 'Science', data: science },
                        { label: 'English', data: english },
                    ]
                },
                options: {
                    responsive: true,
                    tension: 0.4,
                    scales: {
                        y: { beginAtZero: true, max: 10 }
                    }
                }
            });

            // 🧩 INDIVIDUAL SCORE CARDS
            renderScoreCards(item);
        })
        .catch(err => console.error('Graph Error:', err));
}

function renderScoreCards(item) {

    const container = document.getElementById('scoreCards');
    container.innerHTML = '';

    const ignoreFields = ['date'];

    Object.keys(item).forEach(key => {

        if (ignoreFields.includes(key)) return;

        const score = parseFloat(item[key]).toFixed(1);

        container.innerHTML += `
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <small class="text-muted">${formatLabel(key)}</small>
                        <h4 class="fw-bold text-primary">${score}</h4>
                        <div class="progress mt-2">
                            <div class="progress-bar bg-success" 
                                 style="width:${score * 10}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
}

function formatLabel(text) {
    return text
        .replace(/_/g, ' ')
        .replace(/\b\w/g, c => c.toUpperCase());
}

// FILTER CHANGE
document.getElementById('filter').addEventListener('change', function () {
    loadChart(this.value);
});

// DEFAULT LOAD
loadChart('monthly');
</script>

@endsection

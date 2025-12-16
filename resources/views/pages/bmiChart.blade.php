@extends('layouts.app')
@section('contant')

<div id="lab">
    <h2 class="mb-4">Growth Chart (Height, Weight, BMI)</h2>
    <div class="row">
        <!-- LEFT PROFILE CARD -->
        <canvas id="growthChart" width="400" height="200"></canvas>
    </div>
</div>


   <script>
        fetch("{{ route('student.bmi') }}")
        .then(response => response.json())
        .then(data => {
            const labels = [data.name]; // student name
            const heightData = [data.height];
            const weightData = [data.weight];
            const bmiData = [data.bmi];

            const ctx = document.getElementById('growthChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Height (cm)',
                            data: heightData,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Weight (kg)',
                            data: weightData,
                            backgroundColor: 'rgba(255, 206, 86, 0.5)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'BMI',
                            data: bmiData,
                            backgroundColor: 'rgba(75, 192, 192, 0.5)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching BMI data:', error));
    </script>

@endsection




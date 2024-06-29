@extends('layouts.app_dashboard')


@section('content')
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card 1: Total Users -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-4">Total Users</h2>
                <div class="text-4xl font-bold text-gray-800">1,234</div>
            </div>

            <!-- Card 2: Total Orders -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-4">Total Orders</h2>
                <div class="text-4xl font-bold text-gray-800">567</div>
            </div>

            <!-- Card 3: Revenue -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-bold mb-4">Revenue</h2>
                <div class="text-4xl font-bold text-gray-800">$12,345</div>
            </div>

            <!-- Chart: Daily Visits -->
            <div class="bg-white p-6 rounded-lg shadow-md col-span-2">
                <h2 class="text-lg font-bold mb-4">Daily Visits</h2>
                <canvas id="dailyVisitsChart" width="400" height="200"></canvas>
            </div>

            <!-- Chart: Sales Performance -->
            <div class="bg-white p-6 rounded-lg shadow-md col-span-2 lg:col-span-1">
                <h2 class="text-lg font-bold mb-4">Sales Performance</h2>
                <canvas id="salesPerformanceChart" width="400" height="200"></canvas>
            </div>

            <!-- Card 4: Recent Orders -->
            <div class="bg-white p-6 rounded-lg shadow-md col-span-2 lg:col-span-1">
                <h2 class="text-lg font-bold mb-4">Recent Orders</h2>
                <ul>
                    <li class="flex justify-between items-center py-2 border-b">
                        <span>Order #12345</span>
                        <span>$99.99</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b">
                        <span>Order #12346</span>
                        <span>$49.99</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b">
                        <span>Order #12347</span>
                        <span>$79.99</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sample Scripts for Charts (Replace with actual charting library setup) -->
    <script>
        // Sample Data
        var dailyVisitsData = {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Visits',
                data: [120, 150, 180, 170, 160, 190, 200],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var salesPerformanceData = {
            labels: ['Q1', 'Q2', 'Q3', 'Q4'],
            datasets: [{
                label: 'Sales ($)',
                data: [5000, 7000, 6000, 9000],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Initialize Charts
        var dailyVisitsCtx = document.getElementById('dailyVisitsChart').getContext('2d');
        var dailyVisitsChart = new Chart(dailyVisitsCtx, {
            type: 'bar',
            data: dailyVisitsData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var salesPerformanceCtx = document.getElementById('salesPerformanceChart').getContext('2d');
        var salesPerformanceChart = new Chart(salesPerformanceCtx, {
            type: 'line',
            data: salesPerformanceData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

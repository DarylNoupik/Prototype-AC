<x-app-layout>
    
    <div class="container mx-auto">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mt-4">
            <h1 class="text-4xl font-semibold leading-tight text-green-500 font-bold mx-auto">Tableau de bord</h1>
        </div>
        
        <!-- Main content -->
        <main>
            <!-- Content -->
            <div class="mt-6">
                <!-- State cards -->
                <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
                    <!-- Value card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">Projets</h6>
                            <span class="text-xl font-semibold" x-text="totProjet">120</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">+4.4%</span>
                        </div>
                        <div>
                            <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Users card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">Utilisateurs</h6>
                            <span class="text-xl font-semibold" x-text="users">500</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">+2.6%</span>
                        </div>
                        <div>
                            <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Alerts card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">Alertes</h6>
                            <span class="text-xl font-semibold" x-text="totalAlertes">15</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">+3.1%</span>
                        </div>
                        <div>
                            <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Cultures card -->
                    <div class="flex items-center justify-between p-4 bg-white rounded-md">
                        <div>
                            <h6 class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">Cultures</h6>
                            <span class="text-xl font-semibold" x-text="totalCultures">8</span>
                            <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">+3.1%</span>
                        </div>
                        <div>
                            <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
                    <!-- Bar chart card -->
                    <div class="col-span-2 bg-white rounded-md" x-data="{ isOn: false }">
                        <!-- Card header -->
                        <div class="flex items-center justify-between p-4 border-b">
                            <h4 class="text-lg font-semibold">Alertes</h4>
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-500">Last year</span>
                                <button @click="isOn = !isOn; updateBarChart(isOn)" class="relative focus:outline-none">
                                    <div class="w-12 h-6 transition rounded-full bg-gray-300"></div>
                                    <div :class="{ 'translate-x-0 bg-white': !isOn, 'translate-x-6 bg-green-500': isOn }" class="absolute top-0 left-0 w-6 h-6 transform transition-all rounded-full shadow"></div>
                                </button>
                            </div>
                        </div>
                        <!-- Chart -->
                        <div class="relative p-4 h-72" id="sales_chart"></div>
                    </div>

                    <!-- Doughnut chart card -->
                    <div class="bg-white rounded-md">
                        <!-- Card header -->
                        <div class="flex items-center justify-between p-4 border-b">
                            <h4 class="text-lg font-semibold">Cultures en vogue</h4>
                        </div>
                        <!-- Chart -->
                        <div class="relative p-4 h-72" id="doughnutChart">
                            <canvas></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Sample Alpine.js state for handling dynamic values
        function dashboardData() {
            return {
                totProjet: 120,
                users: 500,
                totalAlertes: 15,
                totalCultures: 8,
                updateBarChart(isOn) {
                    console.log('Bar chart toggle', isOn);
                },
                updateDoughnutChart(isOn) {
                    console.log('Doughnut chart toggle', isOn);
                }
            };
        }
    </script>
</x-app-layout>
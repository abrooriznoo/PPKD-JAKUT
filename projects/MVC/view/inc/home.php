<!-- Stats Cards -->
<div class="data-grid mb-6">
    <div class="glass-card p-5 flex items-center">
        <div class="mr-4">
            <div
                class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-500 to-blue-300 flex items-center justify-center">
                <i class="fas fa-users text-white"></i>
            </div>
        </div>
        <div>
            <p class="text-sm opacity-75">Total Users</p>
            <h2 class="text-2xl font-bold">1,248</h2>
            <p class="text-xs text-green-400">+12% from last week</p>
        </div>
    </div>

    <div class="glass-card p-5 flex items-center">
        <div class="mr-4">
            <div
                class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-500 to-purple-300 flex items-center justify-center">
                <i class="fas fa-shopping-cart text-white"></i>
            </div>
        </div>
        <div>
            <p class="text-sm opacity-75">Total Sales</p>
            <h2 class="text-2xl font-bold">$24,890</h2>
            <p class="text-xs text-green-400">+8% from last week</p>
        </div>
    </div>

    <div class="glass-card p-5 flex items-center">
        <div class="mr-4">
            <div
                class="w-12 h-12 rounded-full bg-gradient-to-r from-teal-500 to-teal-300 flex items-center justify-center">
                <i class="fas fa-chart-line text-white"></i>
            </div>
        </div>
        <div>
            <p class="text-sm opacity-75">Conversion Rate</p>
            <h2 class="text-2xl font-bold">3.42%</h2>
            <p class="text-xs text-red-400">-0.5% from last week</p>
        </div>
    </div>

    <div class="glass-card p-5 flex items-center">
        <div class="mr-4">
            <div
                class="w-12 h-12 rounded-full bg-gradient-to-r from-pink-500 to-pink-300 flex items-center justify-center">
                <i class="fas fa-clock text-white"></i>
            </div>
        </div>
        <div>
            <p class="text-sm opacity-75">Avg. Session</p>
            <h2 class="text-2xl font-bold">4m 23s</h2>
            <p class="text-xs text-green-400">+14% from last week</p>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="glass-card p-5 mb-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Performance Overview</h2>
        <div class="flex space-x-2">
            <button class="neumorphic-btn px-3 py-1 rounded-lg text-sm">Day</button>
            <button class="neumorphic-btn px-3 py-1 rounded-lg text-sm">Week</button>
            <button class="neumorphic-btn px-3 py-1 rounded-lg text-sm bg-blue-500 bg-opacity-30">Month</button>
            <button class="neumorphic-btn px-3 py-1 rounded-lg text-sm">Year</button>
        </div>
    </div>

    <div class="h-64">
        <!-- Chart Placeholder (would be replaced with actual chart library in production) -->
        <div class="w-full h-full flex items-center justify-center">
            <div class="text-center">
                <div class="floating mb-4">
                    <i class="fas fa-chart-area text-4xl text-blue-300"></i>
                </div>
                <p class="opacity-75">Interactive chart would display here</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity and Tasks -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="glass-card p-5">
        <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
        <div class="space-y-4">
            <div class="flex items-start">
                <div
                    class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-400 to-teal-400 mr-3 flex-shrink-0 flex items-center justify-center">
                    <i class="fas fa-user text-white text-xs"></i>
                </div>
                <div>
                    <p class="text-sm"><span class="font-semibold">Sarah Johnson</span> created a new
                        project</p>
                    <p class="text-xs opacity-50">2 hours ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <div
                    class="w-8 h-8 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 mr-3 flex-shrink-0 flex items-center justify-center">
                    <i class="fas fa-tasks text-white text-xs"></i>
                </div>
                <div>
                    <p class="text-sm"><span class="font-semibold">System</span> completed scheduled
                        backup</p>
                    <p class="text-xs opacity-50">5 hours ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <div
                    class="w-8 h-8 rounded-full bg-gradient-to-r from-yellow-400 to-orange-400 mr-3 flex-shrink-0 flex items-center justify-center">
                    <i class="fas fa-bell text-white text-xs"></i>
                </div>
                <div>
                    <p class="text-sm"><span class="font-semibold">Michael Chen</span> commented on your
                        report</p>
                    <p class="text-xs opacity-50">1 day ago</p>
                </div>
            </div>
            <div class="flex items-start">
                <div
                    class="w-8 h-8 rounded-full bg-gradient-to-r from-green-400 to-blue-400 mr-3 flex-shrink-0 flex items-center justify-center">
                    <i class="fas fa-upload text-white text-xs"></i>
                </div>
                <div>
                    <p class="text-sm"><span class="font-semibold">You</span> uploaded new documents</p>
                    <p class="text-xs opacity-50">2 days ago</p>
                </div>
            </div>
        </div>
    </div>

    <div class="glass-card p-5">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Tasks</h2>
            <button class="neumorphic-btn px-3 py-1 rounded-lg text-sm">View All</button>
        </div>

        <div class="space-y-4">
            <div class="flex items-center">
                <input type="checkbox"
                    class="rounded-full h-5 w-5 border-2 border-blue-300 bg-transparent focus:ring-0 focus:ring-offset-0">
                <div class="ml-3 flex-1">
                    <p class="text-sm">Complete quarterly financial report</p>
                    <div class="flex items-center mt-1">
                        <div class="w-2 h-2 rounded-full bg-blue-400 mr-2"></div>
                        <p class="text-xs opacity-50">Due tomorrow</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox"
                    class="rounded-full h-5 w-5 border-2 border-purple-300 bg-transparent focus:ring-0 focus:ring-offset-0">
                <div class="ml-3 flex-1">
                    <p class="text-sm">Review user feedback analysis</p>
                    <div class="flex items-center mt-1">
                        <div class="w-2 h-2 rounded-full bg-purple-400 mr-2"></div>
                        <p class="text-xs opacity-50">In progress</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox"
                    class="rounded-full h-5 w-5 border-2 border-green-300 bg-transparent focus:ring-0 focus:ring-offset-0"
                    checked>
                <div class="ml-3 flex-1">
                    <p class="text-sm line-through opacity-70">Update security protocols</p>
                    <div class="flex items-center mt-1">
                        <div class="w-2 h-2 rounded-full bg-green-400 mr-2"></div>
                        <p class="text-xs opacity-50">Completed</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox"
                    class="rounded-full h-5 w-5 border-2 border-yellow-300 bg-transparent focus:ring-0 focus:ring-offset-0">
                <div class="ml-3 flex-1">
                    <p class="text-sm">Prepare presentation for board meeting</p>
                    <div class="flex items-center mt-1">
                        <div class="w-2 h-2 rounded-full bg-yellow-400 mr-2"></div>
                        <p class="text-xs opacity-50">Due next week</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
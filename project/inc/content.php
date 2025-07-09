<div class="flex-1 overflow-y-auto p-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Dashboard Overview</h1>
        <p class="industrial-text-secondary">Welcome back, Admin</p>
    </div>

    <!-- Stats cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="industrial-border p-4 rounded">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm industrial-text-secondary">Total Users</p>
                    <p class="text-2xl font-bold">1,254</p>
                </div>
                <div class="p-3 rounded-full bg-gray-700">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-green-500 text-sm">+12% from last month</span>
            </div>
        </div>

        <div class="industrial-border p-4 rounded">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm industrial-text-secondary">Total Revenue</p>
                    <p class="text-2xl font-bold">$24,780</p>
                </div>
                <div class="p-3 rounded-full bg-gray-700">
                    <i class="fas fa-dollar-sign text-xl"></i>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-green-500 text-sm">+8% from last month</span>
            </div>
        </div>

        <div class="industrial-border p-4 rounded">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm industrial-text-secondary">Products</p>
                    <p class="text-2xl font-bold">356</p>
                </div>
                <div class="p-3 rounded-full bg-gray-700">
                    <i class="fas fa-boxes text-xl"></i>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-red-500 text-sm">-3% from last month</span>
            </div>
        </div>

        <div class="industrial-border p-4 rounded">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm industrial-text-secondary">Active Projects</p>
                    <p class="text-2xl font-bold">24</p>
                </div>
                <div class="p-3 rounded-full bg-gray-700">
                    <i class="fas fa-project-diagram text-xl"></i>
                </div>
            </div>
            <div class="mt-2">
                <span class="text-green-500 text-sm">+5% from last month</span>
            </div>
        </div>
    </div>

    <!-- Charts and tables -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
        <!-- Chart -->
        <div class="lg:col-span-2 industrial-border p-4 rounded">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Revenue Overview</h2>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-xs industrial-accent rounded">Monthly</button>
                    <button class="px-3 py-1 text-xs bg-gray-700 rounded hover:bg-gray-600">Yearly</button>
                </div>
            </div>
            <div class="h-64">
                <!-- Chart placeholder -->
                <div class="flex items-center justify-center h-full industrial-accent rounded">
                    <p class="text-gray-400">Chart will be displayed here</p>
                </div>
            </div>
        </div>

        <!-- Recent activities -->
        <div class="industrial-border p-4 rounded">
            <h2 class="text-lg font-semibold mb-4">Recent Activities</h2>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-user-plus text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">New user registered</p>
                        <p class="text-xs industrial-text-secondary">2 minutes ago</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">New order #1234</p>
                        <p class="text-xs industrial-text-secondary">15 minutes ago</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-truck text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Order #1232 shipped</p>
                        <p class="text-xs industrial-text-secondary">1 hour ago</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <div class="h-8 w-8 rounded-full bg-gray-700 flex items-center justify-center">
                            <i class="fas fa-exclamation-circle text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">System alert resolved</p>
                        <p class="text-xs industrial-text-secondary">3 hours ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent orders table -->
    <div class="industrial-border rounded overflow-hidden mb-6">
        <div class="p-4 flex justify-between items-center industrial-border">
            <h2 class="text-lg font-semibold">Recent Orders</h2>
            <button onclick="openModal('orderModal')"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-sm font-medium">
                <i class="fas fa-plus mr-2"></i> Add Order
            </button>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="industrial-accent">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Order
                            ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Amount
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">#1234</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">John Smith</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">2023-05-15</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-900 text-green-200">Completed</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">$245.00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button class="text-blue-400 hover:text-blue-300 mr-3">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-yellow-400 hover:text-yellow-300">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">#1233</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">Sarah Johnson</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">2023-05-14</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-900 text-yellow-200">Processing</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">$189.00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button class="text-blue-400 hover:text-blue-300 mr-3">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-yellow-400 hover:text-yellow-300">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">#1232</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">Michael Brown</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">2023-05-13</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full bg-blue-900 text-blue-200">Shipped</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">$320.00</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button class="text-blue-400 hover:text-blue-300 mr-3">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-yellow-400 hover:text-yellow-300">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
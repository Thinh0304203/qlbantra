<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Admin Order Management</h1>
                <nav class="flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-800">Dashboard</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Orders</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Products</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Customers</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Reports</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Settings</a>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-6 py-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Orders</h2>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    <i class="fas fa-plus"></i> New Order
                </button>
            </div>

            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Order ID</th>
                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Customer</th>
                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1001</td>
                            <td class="py-2 px-4 border-b border-gray-200">John Doe</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-01</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Completed</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$150.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1002</td>
                            <td class="py-2 px-4 border-b border-gray-200">Jane Smith</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-02</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$200.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1003</td>
                            <td class="py-2 px-4 border-b border-gray-200">Michael Brown</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-03</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">Cancelled</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$50.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1004</td>
                            <td class="py-2 px-4 border-b border-gray-200">Emily Davis</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-04</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Completed</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$300.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1005</td>
                            <td class="py-2 px-4 border-b border-gray-200">Chris Johnson</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-05</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$120.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1006</td>
                            <td class="py-2 px-4 border-b border-gray-200">Patricia Williams</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-06</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">Cancelled</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$80.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1007</td>
                            <td class="py-2 px-4 border-b border-gray-200">Robert Martinez</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-07</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Completed</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$250.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1008</td>
                            <td class="py-2 px-4 border-b border-gray-200">Linda Anderson</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-08</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$180.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1009</td>
                            <td class="py-2 px-4 border-b border-gray-200">Barbara Thomas</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-09</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">Cancelled</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$90.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1010</td>
                            <td class="py-2 px-4 border-b border-gray-200">James Jackson</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-10</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Completed</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$220.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1011</td>
                            <td class="py-2 px-4 border-b border-gray-200">Mary White</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-11</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$140.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1012</td>
                            <td class="py-2 px-4 border-b border-gray-200">William Harris</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-12</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded">Cancelled</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$60.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1013</td>
                            <td class="py-2 px-4 border-b border-gray-200">Richard Clark</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-13</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Completed</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$170.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1014</td>
                            <td class="py-2 px-4 border-b border-gray-200">Joseph Lewis</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-14</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$130.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">#1015</td>
                            <td class="py-2 px-4 border-b border-gray-200">Charles Walker</td>
                            <td class="py-2 px-4 border-b border-gray-200">2023-10-15</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Completed</span>
                            </td>
                            <td class="py-2 px-4 border-b border-gray-200">$110.00</td>
                            <td class="py-2 px-4 border-b border-gray-200">
                                <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                                <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow mt-6">
            <div class="container mx-auto px-6 py-4 text-center text-gray-600">
                &copy; 2023 Admin Order Management. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>

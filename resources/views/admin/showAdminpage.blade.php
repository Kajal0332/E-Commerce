<!--
=========================================================
* Material Dashboard 3 - v3.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Material Dashboard 3 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('/asset/css/material-dashboard.css') }}">
    <!-- <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" /> -->
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                
                <span class="ms-1 text-sm text-dark fs-1"><strong>ECom.</strong></span>
            </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active bg-gradient-dark text-white" href="../pages/dashboard.html">
                        <i class="material-symbols-rounded opacity-5">dashboard</i>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ URL::to('product')}}">
                        <i class="material-symbols-rounded opacity-5">table_view</i>
                        <span class="nav-link-text ms-1">Our Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/billing.html">
                        <i class="material-symbols-rounded opacity-5">receipt_long</i>
                        <span class="nav-link-text ms-1">Our Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('adminCategory') }}">
                        <i class="material-symbols-rounded opacity-5">receipt_long</i>
                        <span class="nav-link-text ms-1">Our Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/virtual-reality.html">
                        <i class="material-symbols-rounded opacity-5">view_in_ar</i>
                        <span class="nav-link-text ms-1">Our Orders</span>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/rtl.html">
                        <i class="material-symbols-rounded opacity-5">format_textdirection_r_to_l</i>
                        <span class="nav-link-text ms-1">User Pages</span>
                    </a>
                </li> -->
                
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/profile.html">
                        <i class="material-symbols-rounded opacity-5">person</i>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <span class="nav-link-text ms-1"><button type="submit" class="btn btn-link text-dark mx-2">Logout</button></span>
                        <i class="material-symbols-rounded opacity-5"></i>
                    </form>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn btn-outline-dark mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
                <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
            </div>
        </div>
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container">
            <!-- Right side Navbar -->
            @yield('rightSideNavbar')
            <!-- End Navbar -->
            @yield('endNavbarContent')
        </div>

    </main>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!-- product add page script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-sWd9JqCjG9S+bA+e/F1l/WvK8L7J3D5zF2L9I8G7cW3A9sP2cR3L8Q1A0r" crossorigin="anonymous"></script>

    <!-- <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Views",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#43A047",
                    data: [50, 45, 22, 28, 50, 60, 76],
                    barThickness: 'flex'
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                            color: "#737373"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                datasets: [{
                    label: "Sales",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            title: function(context) {
                                const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                return fullMonths[context[0].dataIndex];
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 12,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Tasks",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#737373',
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [4, 4]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>




    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const productForm = document.getElementById('productForm');
            const productModal = new bootstrap.Modal(document.getElementById('productModal'));
            let products = [];
            let editingProductId = null;

            function renderProducts() {
                const tableBody = document.getElementById('productTableBody');
                tableBody.innerHTML = '';
                products.forEach(product => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${product.name}</td>
                    <td>$${product.price}</td>
                    <td><img src="${product.img}" alt="${product.name}" style="width: 50px; height: 50px; object-fit: cover;"></td>
                    <td>${product.category}</td>
                    <td>${product.description}</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${product.id}">Edit</button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${product.id}">Delete</button>
                    </td>
                `;
                    tableBody.appendChild(row);
                });
            }

            productForm.addEventListener('submit', (e) => {
                e.preventDefault();

                const name = document.getElementById('productName').value;
                const price = document.getElementById('productPrice').value;
                const img = document.getElementById('productImg').value;
                const category = document.getElementById('productCategory').value;
                const description = document.getElementById('productDescription').value;

                if (editingProductId !== null) {
                    // Update existing product
                    const index = products.findIndex(p => p.id === editingProductId);
                    if (index !== -1) {
                        products[index] = {
                            id: editingProductId,
                            name,
                            price,
                            img,
                            category,
                            description
                        };
                    }
                    editingProductId = null;
                } else {
                    // Add new product
                    const newProduct = {
                        id: Date.now(),
                        name,
                        price,
                        img,
                        category,
                        description
                    };
                    products.push(newProduct);
                }

                renderProducts();
                productModal.hide();
                productForm.reset();
            });

            document.getElementById('productTableBody').addEventListener('click', (e) => {
                const id = parseInt(e.target.getAttribute('data-id'));
                if (e.target.classList.contains('delete-btn')) {
                    products = products.filter(product => product.id !== id);
                    renderProducts();
                } else if (e.target.classList.contains('edit-btn')) {
                    const productToEdit = products.find(product => product.id === id);
                    if (productToEdit) {
                        document.getElementById('productName').value = productToEdit.name;
                        document.getElementById('productPrice').value = productToEdit.price;
                        document.getElementById('productImg').value = productToEdit.img;
                        document.getElementById('productCategory').value = productToEdit.category;
                        document.getElementById('productDescription').value = productToEdit.description;
                        editingProductId = productToEdit.id;
                        productModal.show();
                    }
                }
            });

            document.getElementById('addNewProductBtn').addEventListener('click', () => {
                editingProductId = null;
                productForm.reset();
            });
        });
    </script> -->
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>
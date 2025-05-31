<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Luxury Hotel</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="admin-container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Luxury Hotel</h2>
                <p>Admin Panel</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="active">
                        <a href="dashboard.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="reservations.html"><i class="fas fa-calendar-check"></i> Reservations</a>
                    </li>
                    <li>
                        <a href="rooms.html"><i class="fas fa-bed"></i> Rooms</a>
                    </li>
                    <li>
                        <a href="guests.html"><i class="fas fa-users"></i> Guests</a>
                    </li>
                    <li>
                        <a href="employees.html"><i class="fas fa-user-tie"></i> Employees</a>
                    </li>
                    <li>
                        <a href="housekeeping.html"><i class="fas fa-broom"></i> Housekeeping</a>
                    </li>
                    <li>
                        <a href="inventory.html"><i class="fas fa-boxes"></i> Inventory</a>
                    </li>
                    <li>
                        <a href="feedback.html"><i class="fas fa-comment-alt"></i> Feedback</a>
                    </li>
                    <li>
                        <a href="reports.html"><i class="fas fa-chart-bar"></i> Reports</a>
                    </li>
                    <li>
                        <a href="settings.html"><i class="fas fa-cog"></i> Settings</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="admin-header">
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="admin-profile">
                    <div class="notifications">
                        <i class="fas fa-bell"></i>
                        <span class="notification-count">3</span>
                    </div>
                    <div class="profile-info">
                        <img src="../images/admin-avatar.jpg" alt="Admin">
                        <span>Admin Name</span>
                        <i class="fas fa-chevron-down"></i>
                        <div class="dropdown-menu">
                            <a href="profile.html"><i class="fas fa-user"></i> Profile</a>
                            <a href="settings.html"><i class="fas fa-cog"></i> Settings</a>
                            <a href="../php/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="dashboard-content">
                <div class="dashboard-header">
                    <h1>Dashboard</h1>
                    <div class="date-filter">
                        <label for="dateRange">Date Range:</label>
                        <select id="dateRange">
                            <option value="today">Today</option>
                            <option value="yesterday">Yesterday</option>
                            <option value="week" selected>This Week</option>
                            <option value="month">This Month</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                </div>

                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-details">
                            <h3>New Bookings</h3>
                            <p class="stat-number">24</p>
                            <p class="stat-change positive">+12% <span>from last week</span></p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-details">
                            <h3>Check-ins Today</h3>
                            <p class="stat-number">18</p>
                            <p class="stat-change positive">+5% <span>from yesterday</span></p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <div class="stat-details">
                            <h3>Available Rooms</h3>
                            <p class="stat-number">42</p>
                            <p class="stat-change negative">-8% <span>from last week</span></p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-details">
                            <h3>Revenue</h3>
                            <p class="stat-number">$12,450</p>
                            <p class="stat-change positive">+15% <span>from last week</span></p>
                        </div>
                    </div>
                </div>

                <div class="dashboard-widgets">
                    <div class="widget recent-bookings">
                        <div class="widget-header">
                            <h3>Recent Bookings</h3>
                            <a href="reservations.html" class="view-all">View All</a>
                        </div>
                        <div class="widget-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Guest Name</th>
                                        <th>Room</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#BK1001</td>
                                        <td>John Doe</td>
                                        <td>Deluxe Room</td>
                                        <td>May 15, 2025</td>
                                        <td>May 18, 2025</td>
                                        <td><span class="status confirmed">Confirmed</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-view" title="View Details"><i class="fas fa-eye"></i></button>
                                                <button class="btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-delete" title="Cancel"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#BK1002</td>
                                        <td>Jane Smith</td>
                                        <td>Suite</td>
                                        <td>May 16, 2025</td>
                                        <td>May 20, 2025</td>
                                        <td><span class="status pending">Pending</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-view" title="View Details"><i class="fas fa-eye"></i></button>
                                                <button class="btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-delete" title="Cancel"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#BK1003</td>
                                        <td>Robert Johnson</td>
                                        <td>Standard Room</td>
                                        <td>May 17, 2025</td>
                                        <td>May 19, 2025</td>
                                        <td><span class="status confirmed">Confirmed</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-view" title="View Details"><i class="fas fa-eye"></i></button>
                                                <button class="btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-delete" title="Cancel"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#BK1004</td>
                                        <td>Emily Davis</td>
                                        <td>Deluxe Room</td>
                                        <td>May 18, 2025</td>
                                        <td>May 22, 2025</td>
                                        <td><span class="status cancelled">Cancelled</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-view" title="View Details"><i class="fas fa-eye"></i></button>
                                                <button class="btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-delete" title="Cancel"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#BK1005</td>
                                        <td>Michael Brown</td>
                                        <td>Suite</td>
                                        <td>May 19, 2025</td>
                                        <td>May 21, 2025</td>
                                        <td><span class="status confirmed">Confirmed</span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn-view" title="View Details"><i class="fas fa-eye"></i></button>
                                                <button class="btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                                                <button class="btn-delete" title="Cancel"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="widgets-row">
                        <div class="widget room-status">
                            <div class="widget-header">
                                <h3>Room Status</h3>
                                <a href="rooms.html" class="view-all">View All</a>
                            </div>
                            <div class="widget-content">
                                <div class="room-status-chart">
                                    <canvas id="roomStatusChart"></canvas>
                                </div>
                                <div class="room-status-legend">
                                    <div class="legend-item">
                                        <span class="legend-color occupied"></span>
                                        <span class="legend-label">Occupied (65%)</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color available"></span>
                                        <span class="legend-label">Available (25%)</span>
                                    </div>
                                    <div class="legend-item">
                                        <span class="legend-color maintenance"></span>
                                        <span class="legend-label">Maintenance (10%)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="widget housekeeping">
                            <div class="widget-header">
                                <h3>Housekeeping Tasks</h3>
                                <a href="housekeeping.html" class="view-all">View All</a>
                            </div>
                            <div class="widget-content">
                                <ul class="task-list">
                                    <li class="task-item">
                                        <div class="task-info">
                                            <h4>Room 101 - Cleaning</h4>
                                            <p>Assigned to: Maria Garcia</p>
                                        </div>
                                        <div class="task-status pending">Pending</div>
                                    </li>
                                    <li class="task-item">
                                        <div class="task-info">
                                            <h4>Room 205 - Maintenance</h4>
                                            <p>Assigned to: John Smith</p>
                                        </div>
                                        <div class="task-status in-progress">In Progress</div>
                                    </li>
                                    <li class="task-item">
                                        <div class="task-info">
                                            <h4>Room 310 - Cleaning</h4>
                                            <p>Assigned to: Lisa Johnson</p>
                                        </div>
                                        <div class="task-status completed">Completed</div>
                                    </li>
                                    <li class="task-item">
                                        <div class="task-info">
                                            <h4>Room 412 - Cleaning</h4>
                                            <p>Assigned to: Maria Garcia</p>
                                        </div>
                                        <div class="task-status pending">Pending</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widgets-row">
                        <div class="widget recent-feedback">
                            <div class="widget-header">
                                <h3>Recent Feedback</h3>
                                <a href="feedback.html" class="view-all">View All</a>
                            </div>
                            <div class="widget-content">
                                <div class="feedback-item">
                                    <div class="feedback-header">
                                        <div class="guest-info">
                                            <img src="../images/guest1.jpg" alt="Guest">
                                            <div>
                                                <h4>John Doe</h4>
                                                <p>May 14, 2025</p>
                                            </div>
                                        </div>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <p class="feedback-text">"Amazing experience! The staff was very friendly and the rooms were immaculate."</p>
                                </div>
                                <div class="feedback-item">
                                    <div class="feedback-header">
                                        <div class="guest-info">
                                            <img src="../images/guest2.jpg" alt="Guest">
                                            <div>
                                                <h4>Jane Smith</h4>
                                                <p>May 13, 2025</p>
                                            </div>
                                        </div>
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <p class="feedback-text">"Great hotel with excellent amenities. The only issue was the slow Wi-Fi in some areas."</p>
                                </div>
                            </div>
                        </div>

                        <div class="widget inventory-status">
                            <div class="widget-header">
                                <h3>Inventory Status</h3>
                                <a href="inventory.html" class="view-all">View All</a>
                            </div>
                            <div class="widget-content">
                                <ul class="inventory-list">
                                    <li class="inventory-item">
                                        <div class="inventory-info">
                                            <h4>Towels</h4>
                                            <div class="progress-bar">
                                                <div class="progress" style="width: 75%;"></div>
                                            </div>
                                        </div>
                                        <div class="inventory-count">150/200</div>
                                    </li>
                                    <li class="inventory-item">
                                        <div class="inventory-info">
                                            <h4>Bed Sheets</h4>
                                            <div class="progress-bar">
                                                <div class="progress" style="width: 60%;"></div>
                                            </div>
                                        </div>
                                        <div class="inventory-count">120/200</div>
                                    </li>
                                    <li class="inventory-item warning">
                                        <div class="inventory-info">
                                            <h4>Toiletries</h4>
                                            <div class="progress-bar">
                                                <div class="progress" style="width: 25%;"></div>
                                            </div>
                                        </div>
                                        <div class="inventory-count">50/200</div>
                                    </li>
                                    <li class="inventory-item">
                                        <div class="inventory-info">
                                            <h4>Cleaning Supplies</h4>
                                            <div class="progress-bar">
                                                <div class="progress" style="width: 85%;"></div>
                                            </div>
                                        </div>
                                        <div class="inventory-count">170/200</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="admin.js"></script>
</body>

</html>
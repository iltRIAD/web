<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout4</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f7fafc;
        }

        .navbar, .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .header {
            background-color: #227c78;
            color: white;
            padding: 1rem 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-logo img {
            max-height: 40px;
        }

        .header-links span {
            margin-left: 2rem;
            cursor: pointer;
        }

        .breadcrumb {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 1rem 0;
        }

        .breadcrumb span {
            color: #718096;
            font-size: 0.875rem;
        }

        .content {
            display: flex;
            padding: 2rem 0;
        }

        .sidebar {
            width: 25%;
            padding-right: 2rem;
        }

        .sidebar-card {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 0.375rem;
            padding: 1.5rem;
        }

        .sidebar-card h2, .sidebar-card h3 {
            margin-bottom: 1rem;
        }

        .sidebar-card ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar-card li {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .sidebar-card input {
            margin-right: 0.5rem;
        }

        .stations {
            width: 75%;
        }

        .stations h1 {
            margin-bottom: 1.5rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .grid-card {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 0.375rem;
            padding: 1rem;
            text-align: center;
        }

        .grid-card img {
            width: 100%;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        .grid-card h2 {
            margin-bottom: 0.5rem;
        }

        .grid-card p {
            color: #718096;
            font-size: 0.875rem;
        }

        .search-bar {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .search-bar input {
            flex: 1;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 0.375rem;
        }

        .search-bar button {
            padding: 0.5rem 1rem;
            background-color: #227c78;
            color: white;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #24504d;
        }

    </style>
</head>
<body>
    <header class="header">
        <div class="navbar header-content">
            <div class="header-logo">
                <img src="https://placehold.co/100x40" alt="Company Logo">
            </div>
            <div class="header-links">
                <span>Company</span>
                <span>Products and Solutions</span>
                <span>Find a Station</span>
            </div>
        </div>
    </header>

    <nav class="breadcrumb">
        <div class="navbar">
            <span>Home » EV Charging Stations</span>
        </div>
    </nav>

    <div class="container content">
        <aside class="sidebar">
            <div class="sidebar-card">
                <div class="search-bar">
                    <input type="text" id="search-bar" placeholder="Search for stations...">
                    <button id="search-button">Search</button>
                </div>

                <h2>Filter by:</h2>

                <h3>City</h3>
                <ul>
                    <li><input type="checkbox" id="dhaka" value="dhaka"><label for="dhaka">Dhaka</label></li>
                    <li><input type="checkbox" id="chittagong" value="chittagong"><label for="chittagong">Chittagong</label></li>
                    <li><input type="checkbox" id="sylhet" value="sylhet"><label for="sylhet">Sylhet</label></li>
                    <li><input type="checkbox" id="comilla" value="comilla"><label for="comilla">Comilla</label></li>
                </ul>

                <h3>Area</h3>
                <ul>
                    <li><input type="checkbox" id="dhanmondi" value="dhanmondi"><label for="dhanmondi">Dhanmondi</label></li>
                    <li><input type="checkbox" id="bashundhara" value="bashundhara"><label for="bashundhara">Bashundhara</label></li>
                    <li><input type="checkbox" id="mirpur" value="mirpur"><label for="mirpur">Mirpur</label></li>
                    <li><input type="checkbox" id="uttara" value="uttara"><label for="uttara">Uttara</label></li>
                </ul>
            </div>
        </aside>

        <main class="stations">
            <h1>Total 56 EV Charging Stations Found In Dhaka</h1>
            <div class="grid">
                <div class="grid-card">
                    <img src="https://placehold.co/250x150" alt="Station 1">
                    <a href="slot_booking.php" style="text-decoration: none; color: black;"><h2>Shimanto 1</h2></a>
                    <p>Dhaka, Dhanmondi - 4/a</p>
                </div>
                <div class="grid-card">
                    <img src="https://placehold.co/250x150" alt="Station 2">
                    <h2>Shimanto 2</h2>
                    <p>Dhaka, Dhanmondi - 5/a</p>
                </div>
                <div class="grid-card">
                    <img src="https://placehold.co/250x150" alt="Station 3">
                    <h2>Shimanto 3</h2>
                    <p>Dhaka, Dhanmondi - 15/a</p>
                </div>
                <div class="grid-card">
                    <img src="https://placehold.co/250x150" alt="Station 1">
                    <h2>Shimanto 1</h2>
                    <p>Dhaka, Dhanmondi - 4/a</p>
                </div>
                <div class="grid-card">
                    <img src="https://placehold.co/250x150" alt="Station 2">
                    <h2>Shimanto 2</h2>
                    <p>Dhaka, Dhanmondi - 5/a</p>
                </div>
                <div class="grid-card">
                    <img src="https://placehold.co/250x150" alt="Station 3">
                    <h2>Shimanto 3</h2>
                    <p>Dhaka, Dhanmondi - 15/a</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

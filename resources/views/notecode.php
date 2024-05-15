<?php 
session_start();




$employer = 1004033022 ;
require_once '../classes/manage.php';
$query = new Manage();

$dsn = "mysql:host=localhost;dbname=ebsdb";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 

} catch (PDOException $e) {
  echo "Database connection failed: " . $e->getMessage();
}
$perpage = 20;
// Define pagination parameters
$recordsPerPage = $perpage; // Number of records to display per page

// Determine the total number of records
 // SQL query to count the total number of records
 $sql = "SELECT COUNT(*) AS total_count FROM employer_tb";
 $stmt = $pdo->query($sql);
 $result = $stmt->fetch(PDO::FETCH_ASSOC);

 // Retrieve the total count value
 $totalRecords = $result['total_count'];
//var_dump($totalRecords);
// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage); // Calculate the total number of pages

$currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page from the query parameters
$currentpage = max(1, min($currentpage, $totalPages)); // Ensure the current page is within the valid range

$chunkSize = $perpage; // Number of page links to display in a chunk
$chunkOffset = floor($chunkSize / 2); // Offset to center the current page link in the chunk

$startPage = max(1, $currentpage - $chunkOffset);
$endPage = min($startPage + $chunkSize - 1, $totalPages);

// Calculate the offset and retrieve the records for the current page
$offset = ($currentpage - 1) * $recordsPerPage;
// var_dump($currentpage);
// var_dump($offset);
$sql = "SELECT company_name, ecs_number,rc_number,bussiness_area, createdAt FROM employer_tb limit $offset, $perpage";
$stmt = $pdo->query($sql);
$currentPageRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<?php
echo "<style> 
a,  {
    float: left;
    display: block;
    padding:9px 12px;
    border: solid 1px #ddd;
    background: #fff;
    text-align:left;
    font-size: 16px;
}
a {
    color: #808080;
}
a:hover {
    color: #FEBE33;
    border-color: #036;
}
.no_link {
    color: #FEBE33;
}
</style>
"
?>

<div class="card">
    <h5 class="card-header" style="font-size:30px;">Unapprove Employers</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <!-- <table id="tabulka_kariet1" class="table "> REMOVE DATA TABLE-->
            <table id="" class="table ">
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="min-w-200px">Employer</th>
                        <th class="min-w-200px">ECS Number</th>
                        <th class="min-w-200px">RC Number</th>
                        <th class="min-w-200px">Bussiness Type</th>
                        <th class="min-w-200px">Date Registered</th>


                        <th class="min-w-200px">Tag</th>
                        <th class="min-w-200px">Status</th>
                        <th class="min-w-200px">Manage</th>

                    															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
                </thead>
                <tbody>


                    <?php //foreach($employees as $row){ ?>
                    <?php foreach($currentPageRecords as $row) {?>
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                <?php echo $row['company_name'] ?></strong>
                        </td>
                        <td><?php echo $row['ecs_number'] ?></td>
                        <td><?php echo $row['rc_number'] ?></td>
                        <td><?php echo $row['bussiness_area'] ?></td>
                        <td><?php echo $row['createdAt'] ?></td>

                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    															<th class="min-w-200px text-end rounded-end"></th>
														</tr>

                    <?php } ?>
                    
                </tbody>
               
            </table>



            <?php // Generate pagination links
// Display the paginated data
for ($page = $startPage; $page <= $endPage; $page++) {
  $isActive = ($page == $currentpage) ? "active" : "";
  echo "<a href='unapproved_employers.php?page=$page' class='$isActive'>$page</a> ";
}

// Adjust the chunk links based on the current page and total pages
if ($startPage > 1) {
  echo "<a href='unapproved_employers.php?page=1'>First</a> ";
  echo "<a href='unapproved_employers.php?page=" . ($startPage - 1) . "'>&laquo;</a> ";
}

if ($endPage < $totalPages) {
  echo "<a  href='unapproved_employers.php?page=" . ($endPage + 1) . "'>&raquo;</a> ";
  echo "<a  href='unapproved_employers.php?page=$totalPages' class="pagination">Last</a> ";
}

// Close the database connection
$pdo = null;?>
        </div>
    </div>
</div>




<?php
session_start();

$employer = 1004033022;
require_once '../classes/manage.php';
$query = new Manage();

$dsn = "mysql:host=localhost;dbname=ebsdb";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}

$perpage = 20;

// Define pagination parameters
$recordsPerPage = $perpage; // Number of records to display per page

// Determine the total number of records
$sql = "SELECT COUNT(*) AS total_count FROM employer_tb";
$stmt = $pdo->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Retrieve the total count value
$totalRecords = $result['total_count'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);

$currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page from the query parameters
$currentpage = max(1, min($currentpage, $totalPages)); // Ensure the current page is within the valid range

$chunkSize = $perpage; // Number of page links to display in a chunk
$chunkOffset = floor($chunkSize / 2); // Offset to center the current page link in the chunk

$startPage = max(1, $currentpage - $chunkOffset);
$endPage = min($startPage + $chunkSize - 1, $totalPages);

// Calculate the offset and retrieve the records for the current page
$offset = ($currentpage - 1) * $recordsPerPage;

$sql = "SELECT company_name, ecs_number, rc_number, bussiness_area, createdAt FROM employer_tb limit $offset, $perpage";
$stmt = $pdo->query($sql);
$currentPageRecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card">
    <h5 class="card-header" style="font-size: 30px;">Unapprove Employers</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="min-w-200px">Employer</th>
                        <th class="min-w-200px">ECS Number</th>
                        <th class="min-w-200px">RC Number</th>
                        <th class="min-w-200px">Bussiness Type</th>
                        <th class="min-w-200px">Date Registered</th>
                        <th class="min-w-200px">Tag</th>
                        <th class="min-w-200px">Status</th>
                        <th class="min-w-200px">Manage</th>
                    															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
                </thead>
                <tbody>
                    <?php foreach ($currentPageRecords as $row) { ?>
                        <tr class="fw-bold text-muted bg-light">
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $row['company_name'] ?></strong>
                            </td>
                            <td><?php echo $row['ecs_number'] ?></td>
                            <td><?php echo $row['rc_number'] ?></td>
                            <td><?php echo $row['bussiness_area'] ?></td>
                            <td><?php echo $row['createdAt'] ?></td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                        <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-label-primary me-1">Active</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        															<th class="min-w-200px text-end rounded-end"></th>
														</tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <?php
                    // Generate the "Previous" link
                    if ($currentpage > 1) {
                        echo '<li class="page-item"><a class="page-link" href="unapproved_employers.php?page=' . ($currentpage - 1) . '">Previous</a></li>';
                    }

                    // Generate the page links
                    for ($page = $startPage; $page <= $endPage; $page++) {
                        $isActive = ($page == $currentpage) ? "active" : "";
                        echo '<li class="page-item ' . $isActive . '"><a class="page-link" href="unapproved_employers.php?page=' . $page . '">' . $page . '</a></li>';
                    }

                    // Generate the "Next" link
                    if ($currentpage < $totalPages) {
                        echo '<li class="page-item"><a class="page-link" href="unapproved_employers.php?page=' . ($currentpage + 1) . '">Next</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <!-- End Pagination -->
        </div>
    </div>
</div>

<?php
// Close the database connection
$pdo = null;
?>













<!-- Determine the total number of pages based on your data and the desired number of items per page. Let's assume you have a variable called $totalItems representing the total number of items and $itemsPerPage representing the number of items to display on each page.
You can calculate the total number of pages using the following code: -->
$totalPages = ceil($totalItems / $itemsPerPage);

<!-- Determine the current page based on the user's input or any other logic. 
You can retrieve the current page number from the URL parameters or set a default value if it's not provided. For example: -->
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;


<!-- Calculate the start and end item indices for the current page. 
You can use these indices to extract the relevant data from your data source. Here's an example: -->
$startItem = ($currentPage - 1) * $itemsPerPage;
$endItem = min($startItem + $itemsPerPage - 1, $totalItems - 1);

<!-- Retrieve the data for the current page from your data source. This step may involve querying a database or fetching data from an API. 
For simplicity, let's assume you have an array of items called $items. You can extract the relevant subset using the array_slice() function: -->
$currentPageItems = array_slice($items, $startItem, $itemsPerPage);

<!-- Display the data to the user, along with the pagination links. To generate the pagination links, 
you can use Bootstrap's pagination component and generate the appropriate HTML markup based on the current page and the total number of pages. Here's an example: -->

echo '<ul class="pagination">';

    // Generate the "Previous" link
    if ($currentPage > 1) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
    }

    // Generate the page links
    for ($i = 1; $i <= $totalPages; $i++) { echo '<li class="page-item ' . ($i==$currentPage ? 'active' : '' ) . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>' ; } // Generate the "Next" link if ($currentPage < $totalPages) { echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>' ; } echo '</ul>' ; 
    
    
    
    Finally, display the data to the user using a loop or any other appropriate method. Here's an example: 
    foreach ($currentPageItems as $item) { // Display the item echo '<div>' . $item . '</div>' ; }
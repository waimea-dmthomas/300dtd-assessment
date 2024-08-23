<!-- Generate a list of categories-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get all categories
$query = 'SELECT * FROM categories';
$stmt = $db->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll();

consoleLog($categories, 'DB Data');

// Create table
echo '<article id="category-list">';
    echo '<table>';

        // Table header
        echo '<tr>';
            echo '<th>Category</th>';
            echo '<th>Description</th>';
            echo '<th>Topics</th>';
            echo '<th>Last Activity</th>';
        echo '</tr>';

        // Loop through categores
        foreach($categories as $category) {

            // Get amount of topics
            $categoryID = $category['id'];
            $query2 = "SELECT * FROM topics WHERE category = '$categoryID' ORDER BY timestamp DESC";
            $stmt2 = $db->prepare($query2);
            $stmt2->execute();
            $topic = $stmt2->fetch();

            echo '<tr>';
                echo '<td>';
                    echo '<a href="/category/' . $category['id'] . '" role="button">' . $category['title'] . '</a>';
                echo '</td>';

                echo '<td>';
                    echo '<p>' . $category['description'] . '</p>';
                echo '</td>';

                echo '<td>';
                    echo '<p>' . $stmt2->rowCount() . '</p>';
                echo '</td>';
                
                if ($stmt2->rowCount() > 1) {
                    echo '<td>';
                        echo '<p>' . time_elapsed_string($topic['timestamp']) . '</p>';
                    echo '</td>';
                }
                else {
                    echo '<td>';
                        echo '<p>Never</p>';
                    echo '</td>';
                }


            echo '</tr>';
        }
    echo '</table>';
echo '</article>';

// Create mobile list
echo '<article id="mobile-category-list">';
    // Loop through categores
    foreach($categories as $category) {

        // Get amount of topics
        $categoryID = $category['id'];
        $query2 = "SELECT * FROM topics WHERE category = '$categoryID' ORDER BY timestamp DESC";
        $stmt2 = $db->prepare($query2);
        $stmt2->execute();
        $topic = $stmt2->fetch();

        echo '<div id="mobile-category-div">';
            echo '<a href="/category/' . $category['id'] . '" role="button">' . $category['title'] . '</a>';

            echo '<p>' . $category['description'] . '</p>';

            echo '<p>' . $stmt2->rowCount() . ' Topics</p>';
                    
            if ($stmt2->rowCount() > 1) {
                    echo '<p>Last Activity ' . time_elapsed_string($topic['timestamp']) . '</p>';
            }
            else {
                    echo '<p>Last Activity Never</p>';
            }
        echo '</div>';
    }
echo '</article>';
<?php
	// error reporting
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	// Import functions
    require_once 'database/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saunter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <?php include 'header.php'; ?>
        <main>
            <div id="content">
                <?php
                    $result = get_first_images();

                    if ($result) {
                        foreach ($result as $item) {
                            echo '<div class="gallery-item">';
                            echo '<a href="content-details.php?id=' . $item['id'] . '">';
                            echo '<img src="'.$item['filename'].'"/>';
                            echo '</a>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </main>
    </div>
    <script>
        let page = 1;
        let isLoading = false;

        function debounce(func, delay) {
            let timeout;
            
            return function() {
                const context = this;
                const args = arguments;
                
                clearTimeout(timeout);
                
                timeout = setTimeout(() => {
                    func.apply(context, args);
                }, delay);
            };
        }
        const debouncedFunction = debounce(loadMoreContent, 500);

        document.addEventListener('DOMContentLoaded', () => {
            window.addEventListener('scroll', () => {
                if ((!isLoading) && ((window.innerHeight + window.scrollY) >= document.body.offsetHeight + 100)) {
                    debouncedFunction();
                }
            });
        });

        async function loadMoreContent() {
            isLoading = true;
            console.log("loading!");
            try {
                const response = await fetch(`templates/functions/load-content.php?page=${page}`);
                
                if (!response.ok) {
                    throw new Error('Network error.');
                }

                const content = await response.text();

                if (content.trim() === '') {
                    return;
                }
                
                document.getElementById('content').innerHTML += content;
                page++;
            } catch (error) {
                console.error('Error fetching content:', error);
            } finally {
                isLoading = false;
            }
        }
    </script>
</body>
</html>
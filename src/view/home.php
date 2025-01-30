<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo(App::buildLink('relative', 'asset/css/confirm-dialog.css')); ?>">
    <link rel="stylesheet" href="<?php echo(App::buildLink('relative', 'asset/css/message-dialog.css')); ?>">
    <link rel="stylesheet" href="<?php echo(App::buildLink('relative', 'asset/css/loading-screen.css')); ?>">
    <link rel="stylesheet" href="<?php echo(App::buildLink('relative', 'asset/css/general-button.css')); ?>">
    <link rel="stylesheet" href="<?php echo(App::buildLink('relative', 'asset/css/general.css')); ?>">
    <script src="<?php echo(App::buildLink('relative', 'asset/js/message-dialog.js')); ?>"></script>
    <script src="<?php echo(App::buildLink('relative', 'asset/js/confirm-dialog.js')); ?>"></script>
    <script src="<?php echo(App::buildLink('relative', 'asset/js/loading-screen.js')); ?>"></script>
</head>
<body>
    <div class="container">
        <h1>Books</h1>
        <ul>
            <li><a href="<?php echo(App::buildLink('route', 'home')); ?>">Refresh</a></li>
        </ul>
        <br>

        <a href="<?php echo(App::buildLink('route', 'create')); ?>">
            <button class="add">Add Book</button>
        </a>
        <br><br>

        <div class="book-grid">
            <!-- Display books here -->
            <?php
            foreach ($data['books'] as $book) {
                echo('<div class="book-card">');
                echo('    <h3>' . htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8') . '</h3>');
                echo('    <p><strong>Author:</strong> ' . htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8') . '</p>');
                echo('    <p><strong>Publisher:</strong> ' . htmlspecialchars($book['publisher'], ENT_QUOTES, 'UTF-8') . '</p>');
                echo('    <p><strong>Year:</strong> ' . htmlspecialchars($book['year'], ENT_QUOTES, 'UTF-8') . '</p>');
                // Actions (Edit & Delete)
                echo('    <div class="actions">');
                echo('        <a href="' . App::buildLink('route', 'edit/' . $book['id']) . '"><button>Edit</button></a>');
                echo('<form action="' . App::buildLink('route', 'book/delete') . '" method="post" style="display:inline;" onsubmit="return submitWithConfirm(event, \'Delete book ' . $book['title'] . '?\');">');
                echo('            <input type="hidden" name="_token" value="' . (isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : null) . '">');
                echo('            <input type="hidden" name="book[id]" value="' . $book['id'] . '">');
                echo('            <input type="submit" value="Delete">');
                echo('        </form>');
                echo('    </div>');
                echo('</div>');
            }
            ?>
        </div>
    </div>
    <?php include(App::buildPath('src/view/script.php')); ?>
</body>
</html>
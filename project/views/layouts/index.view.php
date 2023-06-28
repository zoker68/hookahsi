<!doctype html>
<html lang="ru" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <title><?= $headTitle; ?></title>
</head>
<body class="h-full">
<div class="min-h-full">
    <p class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
        Get free delivery on orders over $100</p>

    <?php viewContent('layouts/nav', $attributes); ?>

    <?php viewContent('layouts/header', $attributes); ?>



    <?php viewContent($template, $attributes); ?>

</div>

</body>
</html>
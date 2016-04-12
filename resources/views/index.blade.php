<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
</head>

<body>
    <div id="app">
        <h1>Hello App!</h1>
        <p>
            <a v-link="{ path: '/test' }">[Test Me]</a>
        </p>
        <router-view></router-view>
    </div>
<script src="js/app.js"></script>
</body>
</html>
<div class="error-container">
    <div class="header-error">
        <i class="bi bi-journal-x"></i>
        <h1><?= $header ?></h1>
    </div>
    <div class="main-error">
        <h2><?= $header2 ?></h2>
        <p><?= $message ?></p>
    </div>
    <div class="controls">
        <button onclick="window.history.back()">
            <i class="bi bi-arrow-left-circle-fill"></i>
            <p>Volver</p>
        </button>
    </div>
</div>
<style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css");
    <?php include_once __DIR__ . '/../../public/assets/styles/NotFound.css'; ?>
</style>
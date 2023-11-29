
<footer class="row bg-dark text-white py-3 d-flex justify-content-center">
    <?php if (!empty($_SESSION['user']) && $_SESSION['user']['userRole'] === 2) : ?>
        <div class="col-md-4">
            <span> © 2023 donkeyfive.com</span>
        </div>
        <div class="col-md-4">
            <span><a href="/contact">Contact</a> - À propos</span>
        </div>
        <div class="col-md-4">
            <span>Paris</span>
        </div>
    <?php else :?>
        <div class="col-md-2">
            <span> © 2023 donkeyfive.com</span>
        </div>
        <div class="col-md-2">
            <span>Paris</span>
        </div>
    <?php endif; ?>
</footer>
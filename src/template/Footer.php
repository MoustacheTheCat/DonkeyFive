<footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 donkeycar.com
        <?php if (!empty($_SESSION['user']) && $_SESSION['user']['role'] === "customer") : ?>
            <div class="row justify-content-center mt-3">
                <div class="col-md-2">
                    <a href="http://donkeycar.com/pages/pageContact.php">Contact</a>
                </div>
            </div>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</footer>
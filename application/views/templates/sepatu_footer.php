<div class="footer">
    <p>copyright@2021</p>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<?php if (isset($citys)) : ?>
    <script>
        let citys = <?= json_encode($citys) ?>
    </script>
<?php endif; ?>
<script>
    const base_url = '<?= base_url(); ?>'
</script>
<script src="<?= base_url(); ?>asset/js/template sepatu.js"></script>
<script src="<?= base_url(); ?>asset/js/<?= $js; ?>"></script>
</body>

</html>
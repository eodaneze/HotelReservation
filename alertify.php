<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
    <?php 
       if(isset($_SESSION['error'])){
          ?>alertify.set('notifier', 'position', 'top-right');
    alertify.error('<?=$_SESSION['error']?>');
    <?php
          unset($_SESSION['error']);
       }elseif(isset($_SESSION['success'])){
                ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?=$_SESSION['success']?>');
    <?php
        unset($_SESSION['success']);
       }
     ?>
    </script>
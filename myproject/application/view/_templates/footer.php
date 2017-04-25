
    <div class="footer">
        Find <a href="https://github.com/panique/mini3">MINI3 on GitHub</a>.
        If you like the project, support it by <a href="http://tracking.rackspace.com/SH1ES">using Rackspace</a> as your hoster [affiliate link].
    </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    
    <?php
    if(session_status() == PHP_SESSION_NONE) session_start();
     if (isset($_SESSION['authenticatedID'])) { 
        echo '<script>var nafn = "'. $_SESSION['username'] .'";</script>';
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="<?php echo URL; ?>js/loading.js"></script>';
    } ?>
</body>
</html>

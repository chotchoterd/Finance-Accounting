<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<header>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="<?php echo base_url('index.php/FinanceAccounting/TableFinance') ?>">Finance & Accounting</a>
            </div>
            <a href="#" class="bar">
                <i class="fas fa-bars"></i>
            </a>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url('index.php/FinanceAccounting/TableFinance') ?>">Home</a></li>
                    <li><a href="<?php echo base_url('index.php/FinanceAccounting/CalculateOT') ?>">Calculate OT</a></li>
                    <li><a href="<?php echo base_url('index.php/FinanceAccounting/SalarySlip') ?>">Salary Slip</a></li>
                    <li><a href="">Profile</a></li>
                    <li><a href="" class="btn btn-primary btn-sm current-date" style="border: none;">Log Out</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<script>
    const bar = document.querySelector(".bar");
    bar.onclick = () => {
        const nav = document.querySelector("nav");
        nav.classList.toggle("nav");
    };
</script>
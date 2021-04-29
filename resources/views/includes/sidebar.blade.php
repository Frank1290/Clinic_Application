<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Hospital Management System</div>
            <a class="nav-link" href="{{url('main')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Master
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{url('hospital')}}">Hospital Master</a>
                    <a class="nav-link" href="{{url('add_disease')}}">Add Disease</a>
                    <a class="nav-link" href="{{url('add_medicine')}}">Add Medicine</a>
                    <!-- <a class="nav-link" href="add_prescription">Add Pescription</a> -->
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Patient
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion">
                    <a class="nav-link" href="{{url('add_prescription')}}">
                        Add Patient

                    </a>

                    <a class="nav-link" href="patient_list"> Patient List</a>

                    </a>

                </nav>
            </div>
            <!-- new one -->


            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Reports
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="payment">Add Payment</a>
                    <a class="nav-link" href="payment_list">Payment</a>
                    <a class="nav-link" href="all_patient">All Patient</a>
                    <a class="nav-link" href="medi_certificate">Medical Certificate</a>

                </nav>
            </div>

            <!-- end -->
        </div>

</nav>
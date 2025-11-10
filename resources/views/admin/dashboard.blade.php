@extends('admin.layouts.app')

@section('title', 'Appointments - Admin')
@section('page-title', 'Manage Appointments')

@section('content')
<div class="app-hero-header d-flex align-items-center">

<!-- Breadcrumb starts -->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="https://www.bootstrapget.com/demos/apollo-medical-admin-template/index.html">
      <i class="ri-home-3-line"></i>
    </a>
  </li>
  <li class="breadcrumb-item text-primary" aria-current="page">
    Clinic Dashboard
  </li>
</ol>
<!-- Breadcrumb ends -->

<!-- Sales stats starts -->
<div class="ms-auto d-lg-flex d-none flex-row">
  <div class="input-group">
    <span class="input-group-text bg-primary-lighten">
      <i class="ri-calendar-2-line text-primary"></i>
    </span>
    <input type="text" id="abc" class="form-control custom-daterange">
  </div>
</div>
<!-- Sales stats ends -->

</div>
<!-- App Hero header ends -->

<!-- App body starts -->
<div class="app-body">

<!-- //////// -->

    <div class="row gx-3">
        <div class="col-xxl-9 col-sm-12">

            <!-- Row starts -->
            <div class="row gx-3">
            <div class="col-sm-4 col-12">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                    <div class="p-2 border border-primary rounded-circle me-3">
                        <div class="icon-box md bg-primary-lighten rounded-5">
                        <i class="ri-surgical-mask-line fs-4 text-primary"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <h1 class="lh-1">980</h1>
                        <p class="m-0">Patients</p>
                    </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-1">
                    <a class="text-primary" href="javascript:void(0);">
                        <span>View All</span>
                        <i class="ri-arrow-right-line text-primary ms-1"></i>
                    </a>
                    <div class="text-end">
                        <p class="mb-0 text-primary">+40%</p>
                        <span class="badge bg-primary-light text-primary small">this month</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                    <div class="p-2 border border-primary rounded-circle me-3">
                        <div class="icon-box md bg-primary-lighten rounded-5">
                        <i class="ri-lungs-line fs-4 text-primary"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <h1 class="lh-1">260</h1>
                        <p class="m-0">Appointments</p>
                    </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-1">
                    <a class="text-primary" href="javascript:void(0);">
                        <span>View All</span>
                        <i class="ri-arrow-right-line ms-1"></i>
                    </a>
                    <div class="text-end">
                        <p class="mb-0 text-primary">+30%</p>
                        <span class="badge bg-primary-light text-primary small">this month</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-4 col-12">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                    <div class="p-2 border border-primary rounded-circle me-3">
                        <div class="icon-box md bg-primary-lighten rounded-5">
                        <i class="ri-money-dollar-circle-line fs-4 text-primary"></i>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <h1 class="lh-1">$6800</h1>
                        <p class="m-0">Revenue</p>
                    </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-1">
                    <a class="text-primary" href="javascript:void(0);">
                        <span>View All</span>
                        <i class="ri-arrow-right-line ms-1"></i>
                    </a>
                    <div class="text-end">
                        <p class="mb-0 text-primary">+20%</p>
                        <span class="badge bg-primary-light text-primary small">this month</span>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row gx-3">
            <div class="col-xxl-12 col-sm-12">
                <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Specialities</h5>
                </div>
                <div class="card-body pt-0">

                    <!-- Row starts -->
                    <div class="row g-3">
                    <div class="col-sm col-6">
                        <div class="card border rounded-5">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                            <img src="assets/images/icons/bone.svg" class="img-3x mb-4" alt="Medical Admin">
                            <h6>Orthopedic</h6>
                            <h2 class="text-primary m-0">9</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm col-6">
                        <div class="card border rounded-5">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                            <img src="assets/images/icons/kidney.svg" class="img-3x mb-4" alt="Hoapital Admin">
                            <h6>Kidney</h6>
                            <h2 class="text-primary m-0">5</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm col-6">
                        <div class="card border rounded-5">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                            <img src="assets/images/icons/liver.svg" class="img-3x mb-4" alt="Hospital Dashboard">
                            <h6>Liver</h6>
                            <h2 class="text-primary m-0">6</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm col-6">
                        <div class="card border rounded-5">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                            <img src="assets/images/icons/stomach.svg" class="img-3x mb-4" alt="Medical Dashboard">
                            <h6>Surgery</h6>
                            <h2 class="text-primary m-0">12</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm col-6">
                        <div class="card border rounded-5">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                            <img src="assets/images/icons/microscope.svg" class="img-3x mb-4" alt="Hospital Dashboard">
                            <h6>Laboratory</h6>
                            <h2 class="text-primary m-0">5</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Row ends -->

                </div>
                </div>
            </div>
            </div>
            <!-- Row ends -->

        </div>
        <div class="col-xxl-3 col-sm-12">
            <div class="card mb-3 display-card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center m-auto">
                <div class="display-card-body m-4">
                    <img src="assets/images/lungs.png" class="img-fluid" alt="Doctor Dashboard">
                    <span class="dot-circle one"></span>
                    <span class="dot-circle two"></span>
                    <span class="dot-circle three"></span>
                    <span class="dot-circle four"></span>
                    <span class="dot-circle five"></span>
                </div>
                <div class="d-flex gap-2">
                    <div class="icon-box border rounded-5">
                    <div class="text-center p-1">
                        <h6 class="text-body small mt-2 mb-0">Left</h6>
                        <div id="sparkline1" style="min-height: 71px;"><div id="apexchartsobifs69q" class="apexcharts-canvas apexchartsobifs69q apexcharts-theme-light" style="width: 70px; height: 71px;"><svg id="SvgjsSvg1512" width="70" height="71" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="70" height="71"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignObject><g id="SvgjsG1514" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1513"><clipPath id="gridRectMaskobifs69q"><rect id="SvgjsRect1515" width="76" height="72" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskobifs69q"></clipPath><clipPath id="nonForecastMaskobifs69q"></clipPath><clipPath id="gridRectMarkerMaskobifs69q"><rect id="SvgjsRect1516" width="74" height="74" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1517" class="apexcharts-radialbar"><g id="SvgjsG1518"><g id="SvgjsG1519" class="apexcharts-tracks"><g id="SvgjsG1520" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 34.996275211981114 13.658536910414927" fill="none" fill-opacity="1" stroke="rgba(234,241,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="8.28048780487805" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 34.996275211981114 13.658536910414927"></path></g></g><g id="SvgjsG1522"><g id="SvgjsG1524" class="apexcharts-series apexcharts-radial-series" seriesName="series-1" rel="1" data:realIndex="0"><path id="SvgjsPath1525" d="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 14.703062152237575 28.405125120046847" fill="none" fill-opacity="0.85" stroke="rgba(35,135,129,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="8.536585365853659" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="288" data:value="80" index="0" j="0" data:pathOrig="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 14.703062152237575 28.405125120046847"></path></g><circle id="SvgjsCircle1523" r="17.201219512195124" cx="35" cy="35" class="apexcharts-radialbar-hollow" fill="transparent"></circle></g></g></g><line id="SvgjsLine1526" x1="0" y1="0" x2="70" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1527" x1="0" y1="0" x2="70" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g></svg></div></div>
                    </div>
                    </div>
                    <div class="icon-box border rounded-5">
                    <div class="text-center p-1">
                        <h6 class="text-body small mt-2 mb-0">Health</h6>
                        <div id="sparkline2" style="min-height: 71px;"><div id="apexchartsn3ffn7w2" class="apexcharts-canvas apexchartsn3ffn7w2 apexcharts-theme-light" style="width: 70px; height: 71px;"><svg id="SvgjsSvg1528" width="70" height="71" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="70" height="71"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignObject><g id="SvgjsG1530" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1529"><clipPath id="gridRectMaskn3ffn7w2"><rect id="SvgjsRect1531" width="76" height="72" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskn3ffn7w2"></clipPath><clipPath id="nonForecastMaskn3ffn7w2"></clipPath><clipPath id="gridRectMarkerMaskn3ffn7w2"><rect id="SvgjsRect1532" width="74" height="74" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1533" class="apexcharts-radialbar"><g id="SvgjsG1534"><g id="SvgjsG1535" class="apexcharts-tracks"><g id="SvgjsG1536" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 34.996275211981114 13.658536910414927" fill="none" fill-opacity="1" stroke="rgba(234,241,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="8.28048780487805" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 34.996275211981114 13.658536910414927"></path></g></g><g id="SvgjsG1538"><g id="SvgjsG1540" class="apexcharts-series apexcharts-radial-series" seriesName="series-1" rel="1" data:realIndex="0"><path id="SvgjsPath1541" d="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 22.455802542538677 17.73439341272978" fill="none" fill-opacity="0.85" stroke="rgba(223,46,63,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="8.536585365853659" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="324" data:value="90" index="0" j="0" data:pathOrig="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 22.455802542538677 17.73439341272978"></path></g><circle id="SvgjsCircle1539" r="17.201219512195124" cx="35" cy="35" class="apexcharts-radialbar-hollow" fill="transparent"></circle></g></g></g><line id="SvgjsLine1542" x1="0" y1="0" x2="70" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1543" x1="0" y1="0" x2="70" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g></svg></div></div>
                    </div>
                    </div>
                    <div class="icon-box border rounded-5">
                    <div class="text-center p-1">
                        <h6 class="text-body small mt-2 mb-0">Right</h6>
                        <div id="sparkline3" style="min-height: 71px;"><div id="apexchartsao6io43w" class="apexcharts-canvas apexchartsao6io43w apexcharts-theme-light" style="width: 70px; height: 71px;"><svg id="SvgjsSvg1544" width="70" height="71" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="70" height="71"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignObject><g id="SvgjsG1546" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1545"><clipPath id="gridRectMaskao6io43w"><rect id="SvgjsRect1547" width="76" height="72" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskao6io43w"></clipPath><clipPath id="nonForecastMaskao6io43w"></clipPath><clipPath id="gridRectMarkerMaskao6io43w"><rect id="SvgjsRect1548" width="74" height="74" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1549" class="apexcharts-radialbar"><g id="SvgjsG1550"><g id="SvgjsG1551" class="apexcharts-tracks"><g id="SvgjsG1552" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 34.996275211981114 13.658536910414927" fill="none" fill-opacity="1" stroke="rgba(234,241,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="8.28048780487805" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 34.996275211981114 13.658536910414927"></path></g></g><g id="SvgjsG1554"><g id="SvgjsG1556" class="apexcharts-series apexcharts-radial-series" seriesName="series-1" rel="1" data:realIndex="0"><path id="SvgjsPath1557" d="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 14.703062152237575 28.405125120046847" fill="none" fill-opacity="0.85" stroke="rgba(35,135,129,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="8.536585365853659" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="288" data:value="80" index="0" j="0" data:pathOrig="M 35 13.658536585365852 A 21.34146341463415 21.34146341463415 0 1 1 14.703062152237575 28.405125120046847"></path></g><circle id="SvgjsCircle1555" r="17.201219512195124" cx="35" cy="35" class="apexcharts-radialbar-hollow" fill="transparent"></circle></g></g></g><line id="SvgjsLine1558" x1="0" y1="0" x2="70" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1559" x1="0" y1="0" x2="70" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g></svg></div></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    <!-- /////////// -->
        <!-- Row starts -->
        <div class="row gx-3">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">
                <h5 class="card-title">Clinic Earnings</h5>
            </div>
            <div class="card-body pt-0">

                <!-- Row start -->
                <div class="row g-3">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                    <div class="me-2">
                        <div id="sparkline1" style="min-height: 61px;"><div id="apexchartssu2wjh6o" class="apexcharts-canvas apexchartssu2wjh6o apexcharts-theme-light" style="width: 60px; height: 61px;"><svg id="SvgjsSvg1376" width="60" height="61" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="60" height="61"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignobject><g id="SvgjsG1378" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1377"><clippath id="gridRectMasksu2wjh6o"><rect id="SvgjsRect1379" width="66" height="62" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMasksu2wjh6o"></clippath><clippath id="nonForecastMasksu2wjh6o"></clippath><clippath id="gridRectMarkerMasksu2wjh6o"><rect id="SvgjsRect1380" width="64" height="64" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath></defs><g id="SvgjsG1381" class="apexcharts-radialbar"><g id="SvgjsG1382"><g id="SvgjsG1383" class="apexcharts-tracks"><g id="SvgjsG1384" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 29.996807324555242 11.707317351784223" fill="none" fill-opacity="1" stroke="rgba(234,241,255,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="7.097560975609756" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 29.996807324555242 11.707317351784223"></path></g></g><g id="SvgjsG1386"><g id="SvgjsG1388" class="apexcharts-series apexcharts-radial-series" seriesName="series-1" rel="1" data:realIndex="0"><path id="SvgjsPath1389" d="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 12.602624701917922 35.6527498971027" fill="none" fill-opacity="0.85" stroke="rgba(35,135,129,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="7.317073170731708" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="252" data:value="70" index="0" j="0" data:pathOrig="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 12.602624701917922 35.6527498971027"></path></g><circle id="SvgjsCircle1387" r="14.74390243902439" cx="30" cy="30" class="apexcharts-radialbar-hollow" fill="transparent"></circle></g></g></g><line id="SvgjsLine1390" x1="0" y1="0" x2="60" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1391" x1="0" y1="0" x2="60" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g></svg></div></div>
                    </div>
                    <div class="m-0">
                        <div class="d-flex align-items-center lh-1">
                        <h4 class="m-0 fw-bold">$4900</h4>
                        <div class="ms-2 text-primary d-flex">
                            <small>20%</small> <i class="ri-arrow-right-up-line ms-1 fw-bold"></i>
                        </div>
                        </div>
                        <small>Online Consultation</small>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                    <div class="me-2">
                        <div id="sparkline2" style="min-height: 61px;"><div id="apexcharts1if0dznr" class="apexcharts-canvas apexcharts1if0dznr apexcharts-theme-light" style="width: 60px; height: 61px;"><svg id="SvgjsSvg1392" width="60" height="61" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="60" height="61"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"></div></foreignobject><g id="SvgjsG1394" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1393"><clippath id="gridRectMask1if0dznr"><rect id="SvgjsRect1395" width="66" height="62" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMask1if0dznr"></clippath><clippath id="nonForecastMask1if0dznr"></clippath><clippath id="gridRectMarkerMask1if0dznr"><rect id="SvgjsRect1396" width="64" height="64" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath></defs><g id="SvgjsG1397" class="apexcharts-radialbar"><g id="SvgjsG1398"><g id="SvgjsG1399" class="apexcharts-tracks"><g id="SvgjsG1400" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 29.996807324555242 11.707317351784223" fill="none" fill-opacity="1" stroke="rgba(230,236,243,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="7.097560975609756" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 29.996807324555242 11.707317351784223"></path></g></g><g id="SvgjsG1402"><g id="SvgjsG1404" class="apexcharts-series apexcharts-radial-series" seriesName="series-1" rel="1" data:realIndex="0"><path id="SvgjsPath1405" d="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 19.247830750747447 44.79909136051733" fill="none" fill-opacity="0.85" stroke="rgba(238,187,48,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="7.317073170731708" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="216" data:value="60" index="0" j="0" data:pathOrig="M 30 11.707317073170731 A 18.29268292682927 18.29268292682927 0 1 1 19.247830750747447 44.79909136051733"></path></g><circle id="SvgjsCircle1403" r="14.74390243902439" cx="30" cy="30" class="apexcharts-radialbar-hollow" fill="transparent"></circle></g></g></g><line id="SvgjsLine1406" x1="0" y1="0" x2="60" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1407" x1="0" y1="0" x2="60" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g></svg></div></div>
                    </div>
                    <div class="m-0">
                        <div class="d-flex align-items-center lh-1">
                        <div class="fs-4 fw-bold">$750</div>
                        <div class="ms-2 text-warning d-flex">
                            <small>26%</small> <i class="ri-arrow-right-down-line ms-1 fw-bold"></i>
                        </div>
                        </div>
                        <small class="text-dark">Overall Purchases</small>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                    <div class="me-2">
                        <div id="sparkline3" style="min-height: 60px;"><div id="apexchartss9utu3sw" class="apexcharts-canvas apexchartss9utu3sw apexcharts-theme-light" style="width: 60px; height: 60px;"><svg id="SvgjsSvg1408" width="60" height="60" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="60" height="60"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 30px;"></div></foreignobject><g id="SvgjsG1458" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1410" class="apexcharts-inner apexcharts-graphical" transform="translate(14.600000000000001, 0)"><defs id="SvgjsDefs1409"><lineargradient id="SvgjsLinearGradient1412" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1413" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1414" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1415" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></lineargradient><clippath id="gridRectMasks9utu3sw"><rect id="SvgjsRect1417" width="64" height="60" x="-12.600000000000001" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMasks9utu3sw"></clippath><clippath id="nonForecastMasks9utu3sw"></clippath><clippath id="gridRectMarkerMasks9utu3sw"><rect id="SvgjsRect1418" width="42.8" height="64" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath></defs><rect id="SvgjsRect1416" width="5.4319999999999995" height="60" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1412)" class="apexcharts-xcrosshairs" y2="60" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG1436" class="apexcharts-grid"><g id="SvgjsG1437" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1440" x1="-10.600000000000001" y1="0" x2="49.4" y2="0" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1441" x1="-10.600000000000001" y1="12" x2="49.4" y2="12" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1442" x1="-10.600000000000001" y1="24" x2="49.4" y2="24" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1443" x1="-10.600000000000001" y1="36" x2="49.4" y2="36" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1444" x1="-10.600000000000001" y1="48" x2="49.4" y2="48" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1445" x1="-10.600000000000001" y1="60" x2="49.4" y2="60" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1438" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1447" x1="0" y1="60" x2="38.8" y2="60" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1446" x1="0" y1="1" x2="0" y2="60" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1419" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1420" class="apexcharts-series" rel="1" seriesName="series-1" data:realIndex="0"><path id="SvgjsPath1425" d="M-2.7159999999999997 58.001L-2.7159999999999997 44.001C-2.7159999999999997 43.001 -1.7159999999999997 42.001 -0.7159999999999997 42.001L0.7159999999999997 42.001C1.7159999999999997 42.001 2.7159999999999997 43.001 2.7159999999999997 44.001L2.7159999999999997 58.001C2.7159999999999997 59.001 1.7159999999999997 60.001 0.7159999999999997 60.001L-0.7159999999999997 60.001C-1.7159999999999997 60.001 -2.7159999999999997 59.001 -2.7159999999999997 58.001C-2.7159999999999997 58.001 -2.7159999999999997 58.001 -2.7159999999999997 58.001 " fill="rgba(35,135,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasks9utu3sw)" pathTo="M -2.7159999999999997 58.001 L -2.7159999999999997 44.001 C -2.7159999999999997 43.001 -1.7159999999999997 42.001 -0.7159999999999997 42.001 L 0.7159999999999997 42.001 C 1.7159999999999997 42.001 2.7159999999999997 43.001 2.7159999999999997 44.001 L 2.7159999999999997 58.001 C 2.7159999999999997 59.001 1.7159999999999997 60.001 0.7159999999999997 60.001 L -0.7159999999999997 60.001 C -1.7159999999999997 60.001 -2.7159999999999997 59.001 -2.7159999999999997 58.001 Z " pathFrom="M -2.7159999999999997 60.001 L -2.7159999999999997 60.001 L 2.7159999999999997 60.001 L 2.7159999999999997 60.001 L 2.7159999999999997 60.001 L 2.7159999999999997 60.001 L 2.7159999999999997 60.001 L -2.7159999999999997 60.001 Z" cy="42" cx="2.7159999999999997" j="0" val="30" barHeight="18" barWidth="5.4319999999999995"></path><path id="SvgjsPath1427" d="M5.043999999999999 58.001L5.043999999999999 8.000999999999998C5.043999999999999 7.000999999999998 6.043999999999999 6.000999999999998 7.043999999999999 6.000999999999998L8.475999999999999 6.000999999999998C9.475999999999999 6.000999999999998 10.475999999999999 7.000999999999998 10.475999999999999 8.000999999999998L10.475999999999999 58.001C10.475999999999999 59.001 9.475999999999999 60.001 8.475999999999999 60.001L7.043999999999999 60.001C6.043999999999999 60.001 5.043999999999999 59.001 5.043999999999999 58.001C5.043999999999999 58.001 5.043999999999999 58.001 5.043999999999999 58.001 " fill="rgba(101,194,188,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasks9utu3sw)" pathTo="M 5.043999999999999 58.001 L 5.043999999999999 8.001000000000001 C 5.043999999999999 7.001000000000001 6.043999999999999 6.001 7.043999999999999 6.001 L 8.475999999999999 6.001 C 9.475999999999999 6.001 10.475999999999999 7.001000000000001 10.475999999999999 8.001000000000001 L 10.475999999999999 58.001 C 10.475999999999999 59.001 9.475999999999999 60.001 8.475999999999999 60.001 L 7.043999999999999 60.001 C 6.043999999999999 60.001 5.043999999999999 59.001 5.043999999999999 58.001 Z " pathFrom="M 5.043999999999999 60.001 L 5.043999999999999 60.001 L 10.475999999999999 60.001 L 10.475999999999999 60.001 L 10.475999999999999 60.001 L 10.475999999999999 60.001 L 10.475999999999999 60.001 L 5.043999999999999 60.001 Z" cy="6" cx="10.475999999999999" j="1" val="90" barHeight="54" barWidth="5.4319999999999995"></path><path id="SvgjsPath1429" d="M12.803999999999998 58.001L12.803999999999998 26.000999999999998C12.803999999999998 25.000999999999998 13.803999999999998 24.000999999999998 14.803999999999998 24.000999999999998L16.235999999999997 24.000999999999998C17.235999999999997 24.000999999999998 18.235999999999997 25.000999999999998 18.235999999999997 26.000999999999998L18.235999999999997 58.001C18.235999999999997 59.001 17.235999999999997 60.001 16.235999999999997 60.001L14.803999999999998 60.001C13.803999999999998 60.001 12.803999999999998 59.001 12.803999999999998 58.001C12.803999999999998 58.001 12.803999999999998 58.001 12.803999999999998 58.001 " fill="rgba(35,135,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasks9utu3sw)" pathTo="M 12.803999999999998 58.001 L 12.803999999999998 26.001 C 12.803999999999998 25.001 13.803999999999998 24.001 14.803999999999998 24.001 L 16.235999999999997 24.001 C 17.235999999999997 24.001 18.235999999999997 25.001 18.235999999999997 26.001 L 18.235999999999997 58.001 C 18.235999999999997 59.001 17.235999999999997 60.001 16.235999999999997 60.001 L 14.803999999999998 60.001 C 13.803999999999998 60.001 12.803999999999998 59.001 12.803999999999998 58.001 Z " pathFrom="M 12.803999999999998 60.001 L 12.803999999999998 60.001 L 18.235999999999997 60.001 L 18.235999999999997 60.001 L 18.235999999999997 60.001 L 18.235999999999997 60.001 L 18.235999999999997 60.001 L 12.803999999999998 60.001 Z" cy="24" cx="18.235999999999997" j="2" val="60" barHeight="36" barWidth="5.4319999999999995"></path><path id="SvgjsPath1431" d="M20.563999999999997 58.001L20.563999999999997 17.000999999999998C20.563999999999997 16.000999999999998 21.563999999999997 15.000999999999998 22.563999999999997 15.000999999999998L23.995999999999995 15.000999999999998C24.995999999999995 15.000999999999998 25.995999999999995 16.000999999999998 25.995999999999995 17.000999999999998L25.995999999999995 58.001C25.995999999999995 59.001 24.995999999999995 60.001 23.995999999999995 60.001L22.563999999999997 60.001C21.563999999999997 60.001 20.563999999999997 59.001 20.563999999999997 58.001C20.563999999999997 58.001 20.563999999999997 58.001 20.563999999999997 58.001 " fill="rgba(101,194,188,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasks9utu3sw)" pathTo="M 20.563999999999997 58.001 L 20.563999999999997 17.000999999999998 C 20.563999999999997 16.000999999999998 21.563999999999997 15.001 22.563999999999997 15.001 L 23.995999999999995 15.001 C 24.995999999999995 15.001 25.995999999999995 16.000999999999998 25.995999999999995 17.000999999999998 L 25.995999999999995 58.001 C 25.995999999999995 59.001 24.995999999999995 60.001 23.995999999999995 60.001 L 22.563999999999997 60.001 C 21.563999999999997 60.001 20.563999999999997 59.001 20.563999999999997 58.001 Z " pathFrom="M 20.563999999999997 60.001 L 20.563999999999997 60.001 L 25.995999999999995 60.001 L 25.995999999999995 60.001 L 25.995999999999995 60.001 L 25.995999999999995 60.001 L 25.995999999999995 60.001 L 20.563999999999997 60.001 Z" cy="15" cx="25.995999999999995" j="3" val="75" barHeight="45" barWidth="5.4319999999999995"></path><path id="SvgjsPath1433" d="M28.323999999999995 58.001L28.323999999999995 35.001C28.323999999999995 34.001 29.323999999999995 33.001 30.323999999999995 33.001L31.755999999999993 33.001C32.75599999999999 33.001 33.75599999999999 34.001 33.75599999999999 35.001L33.75599999999999 58.001C33.75599999999999 59.001 32.75599999999999 60.001 31.755999999999993 60.001L30.323999999999995 60.001C29.323999999999995 60.001 28.323999999999995 59.001 28.323999999999995 58.001C28.323999999999995 58.001 28.323999999999995 58.001 28.323999999999995 58.001 " fill="rgba(35,135,129,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasks9utu3sw)" pathTo="M 28.323999999999995 58.001 L 28.323999999999995 35.001 C 28.323999999999995 34.001 29.323999999999995 33.001 30.323999999999995 33.001 L 31.755999999999993 33.001 C 32.75599999999999 33.001 33.75599999999999 34.001 33.75599999999999 35.001 L 33.75599999999999 58.001 C 33.75599999999999 59.001 32.75599999999999 60.001 31.755999999999993 60.001 L 30.323999999999995 60.001 C 29.323999999999995 60.001 28.323999999999995 59.001 28.323999999999995 58.001 Z " pathFrom="M 28.323999999999995 60.001 L 28.323999999999995 60.001 L 33.75599999999999 60.001 L 33.75599999999999 60.001 L 33.75599999999999 60.001 L 33.75599999999999 60.001 L 33.75599999999999 60.001 L 28.323999999999995 60.001 Z" cy="33" cx="33.75599999999999" j="4" val="45" barHeight="27" barWidth="5.4319999999999995"></path><path id="SvgjsPath1435" d="M36.083999999999996 58.001L36.083999999999996 44.001C36.083999999999996 43.001 37.083999999999996 42.001 38.083999999999996 42.001L39.516 42.001C40.516 42.001 41.516 43.001 41.516 44.001L41.516 58.001C41.516 59.001 40.516 60.001 39.516 60.001L38.083999999999996 60.001C37.083999999999996 60.001 36.083999999999996 59.001 36.083999999999996 58.001C36.083999999999996 58.001 36.083999999999996 58.001 36.083999999999996 58.001 " fill="rgba(101,194,188,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMasks9utu3sw)" pathTo="M 36.083999999999996 58.001 L 36.083999999999996 44.001 C 36.083999999999996 43.001 37.083999999999996 42.001 38.083999999999996 42.001 L 39.516 42.001 C 40.516 42.001 41.516 43.001 41.516 44.001 L 41.516 58.001 C 41.516 59.001 40.516 60.001 39.516 60.001 L 38.083999999999996 60.001 C 37.083999999999996 60.001 36.083999999999996 59.001 36.083999999999996 58.001 Z " pathFrom="M 36.083999999999996 60.001 L 36.083999999999996 60.001 L 41.516 60.001 L 41.516 60.001 L 41.516 60.001 L 41.516 60.001 L 41.516 60.001 L 36.083999999999996 60.001 Z" cy="42" cx="41.516" j="5" val="30" barHeight="18" barWidth="5.4319999999999995"></path><g id="SvgjsG1422" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1424" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMasks9utu3sw)"></g><g id="SvgjsG1426" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMasks9utu3sw)"></g><g id="SvgjsG1428" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMasks9utu3sw)"></g><g id="SvgjsG1430" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMasks9utu3sw)"></g><g id="SvgjsG1432" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMasks9utu3sw)"></g><g id="SvgjsG1434" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMasks9utu3sw)"></g></g><g id="SvgjsG1423" class="apexcharts-bar-shadows apexcharts-hidden-element-shown" style="pointer-events: none"></g></g><g id="SvgjsG1421" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g></g><g id="SvgjsG1439" class="apexcharts-grid-borders" style="display: none;"></g><line id="SvgjsLine1448" x1="-10.600000000000001" y1="0" x2="49.4" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1449" x1="-10.600000000000001" y1="0" x2="49.4" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1450" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1451" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1459" class="apexcharts-yaxis-annotations apexcharts-hidden-element-shown"></g><g id="SvgjsG1460" class="apexcharts-xaxis-annotations apexcharts-hidden-element-shown"></g><g id="SvgjsG1461" class="apexcharts-point-annotations apexcharts-hidden-element-shown"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(35, 135, 129);"></span><div class="apexcharts-tooltip-text" style="font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                    </div>
                    <div class="m-0">
                        <div class="d-flex align-items-center lh-1">
                        <div class="fs-4 fw-bold">$560</div>
                        <div class="ms-2 text-primary d-flex">
                            <small>28%</small> <i class="ri-arrow-right-up-line ms-1 fw-bold"></i>
                        </div>
                        </div>
                        <small class="text-dark">Pending Invoices</small>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="border rounded-2 d-flex align-items-center flex-row p-2">
                    <div class="me-2">
                        <div id="sparkline4" style="min-height: 60px;"><div id="apexchartsmseugn6s" class="apexcharts-canvas apexchartsmseugn6s apexcharts-theme-light" style="width: 60px; height: 60px;"><svg id="SvgjsSvg1462" width="60" height="60" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignobject x="0" y="0" width="60" height="60"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 30px;"></div></foreignobject><rect id="SvgjsRect1466" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1496" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1464" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1463"><clippath id="gridRectMaskmseugn6s"><rect id="SvgjsRect1468" width="69" height="65" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath><clippath id="forecastMaskmseugn6s"></clippath><clippath id="nonForecastMaskmseugn6s"></clippath><clippath id="gridRectMarkerMaskmseugn6s"><rect id="SvgjsRect1469" width="64" height="64" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clippath></defs><line id="SvgjsLine1467" x1="0" y1="0" x2="0" y2="60" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="60" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1475" class="apexcharts-grid"><g id="SvgjsG1476" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1479" x1="0" y1="0" x2="60" y2="0" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1480" x1="0" y1="15" x2="60" y2="15" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1481" x1="0" y1="30" x2="60" y2="30" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1482" x1="0" y1="45" x2="60" y2="45" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1483" x1="0" y1="60" x2="60" y2="60" stroke="#d8dee6" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1477" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1485" x1="0" y1="60" x2="60" y2="60" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1484" x1="0" y1="1" x2="0" y2="60" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1470" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1471" class="apexcharts-series" seriesName="series-1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1474" d="M0 25L12 50L24 0L36 25L48 0L60 25C60 25 60 25 60 25 " fill="none" fill-opacity="1" stroke="rgba(238,187,48,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskmseugn6s)" pathTo="M 0 25 L 12 50 L 24 0 L 36 25 L 48 0 L 60 25" pathFrom="M -1 75 L -1 75 L 12 75 L 24 75 L 36 75 L 48 75 L 60 75" fill-rule="evenodd"></path><g id="SvgjsG1472" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1500" r="0" cx="0" cy="0" class="apexcharts-marker wu6zlyyn8 no-pointer-events" stroke="#ffffff" fill="#eebb30" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1473" class="apexcharts-datalabels" data:realIndex="0"></g></g><g id="SvgjsG1478" class="apexcharts-grid-borders" style="display: none;"></g><line id="SvgjsLine1486" x1="0" y1="0" x2="60" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1487" x1="0" y1="0" x2="60" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1488" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1489" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1497" class="apexcharts-yaxis-annotations apexcharts-hidden-element-shown"></g><g id="SvgjsG1498" class="apexcharts-xaxis-annotations apexcharts-hidden-element-shown"></g><g id="SvgjsG1499" class="apexcharts-point-annotations apexcharts-hidden-element-shown"></g></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(238, 187, 48);"></span><div class="apexcharts-tooltip-text" style="font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                    </div>
                    <div class="m-0">
                        <div class="d-flex align-items-center lh-1">
                        <div class="fs-4 fw-bold">$390</div>
                        <div class="ms-2 text-primary d-flex">
                            <small>30%</small> <i class="ri-arrow-right-up-line ms-1 fw-bold"></i>
                        </div>
                        </div>
                        <small class="text-dark">Monthly Billing</small>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Row ends -->

            </div>
            </div>
        </div>
        </div>
        <!-- Row ends -->

</div>
@endsection

 
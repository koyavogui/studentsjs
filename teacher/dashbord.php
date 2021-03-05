<?php
    require "./../includes/db.php";
    include "./../includes/function.php";

    session_start();
    if (!isset($_SESSION['idUser'])){
      header("location:../");
      exit();
  }
  $statuscours= checkstatutCours($pdo, $_SESSION['idUser']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./../includes/styles.php" ?>
    <title>Tableau de bord</title>
</head>
<body class=" px-5 " style="background-color: #f7f9fc;">
    <main class="container-fluid pb-5">
            <button class="mt-2 btn <?php echo $s = ($statuscours == '0') ? 'btn-warning' : 'btn-success'; ?> btn-success" id="btnCours"><?php echo $s = ($statuscours == '0') ? 'Terminer cours' : 'Démarer cours'; ?> </button>
        <div class="row mt-3">
            <div class="col-12 col-lg-8 mt-1">
            <div class="row">
                <div class="col-12 px-2 col-md-6 col-lg-6 mb-2">
                    <section class="d-flex align-items-center px-1 bg-white rounded rounded-3" style="height: 20vh;">
                        <p class="fs-3">Effectif de la classe</p>
                    </section>
                </div>
                <div class="col-12 col-md-6  col-lg-6 px-2">
                    <section class="d-flex align-items-center px-1 bg-white rounded rounded-3" style="height: 20vh;">
                        <div class="col-9">
                            <p class="fs-3">Nombre d'heures d'absence</p>
                        </div>
                        <div class="col-3">
                            <p class="fs-3">100</p>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row mt-1 mb-3">
                <div class="col-12  px-2">  
                    <div class="px-1 bg-white shadow-sm rounded rounded-3"  style="height: 53vh;">
                    <div class="p-1" style="width: 100%;height: 53vh">
                        <canvas id="canvas"></canvas>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-12 col-lg-4  px-2">
                <div class="d-flex flex-column justify-content-center align-items-center px-1 bg-white shadow-sm px-1 rounded rounded-3"  style="height: 75vh;">
                    <div class="bg-secondary rounded-circle" style="height: 30vh; width: 30vh;"></div>
                    <p class="fs-3 pt-3">Kappiah</p>
                    <p class="fs-3">Marcelin</p>
                    <p  class="fs-3"><i class="bi bi-gear-wide-connected"></i></p>
                </div>
            </div>
        </div>
        <div class="row px-2" style="height: 70vh;">
            <div class="bg-white shadow-sm rounded rounded-3" tabindex="0" style="height: 100%;overflow-y: scroll;">
            <div class="row pt-2 table-responsive mx-2">
                
                <table class="table table-borderless align-middle">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td class="px-0 py-3">
                                <div class="mt-1 me-5">
                                    <span class="bg-ligth-primary align-items-end ">
                                        <img src="../uploaded/150876256_230079698764233_3511641179978773947_o.jpg" alt="" class="rounded rounded-3 img-fluid" style="max-height: 10vh;">
                                    </span>
                                </div>
                            </td>
                            <td class="px-0">
                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Brad Simmons</a>
								<span class="text-muted fw-bold d-block mt-1">HTML, CSS Coding</span>
                            </td>
                            <td class="">
                            </td>
                            <td class="text-end">
                                <span class="text-gray-800 fw-bolder d-block fs-6">$1,200,000</span>
                                <span class="text-muted fw-bold d-block mt-1 fs-7">Paid</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-bolder text-primary">+28%</span>
                            </td>
                            <td class="text-end pe-0">
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-primary btn-sm"><i class="bi bi-arrow-right"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-0 py-3">
                                <div class="mt-1 me-5">
                                    <span class="bg-ligth-primary align-items-end ">
                                        <img src="../uploaded/150876256_230079698764233_3511641179978773947_o.jpg" alt="" class="rounded rounded-3 img-fluid" style="max-height: 10vh;">
                                    </span>
                                </div>
                            </td>
                            <td class="px-0">
                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Brad Simmons</a>
								<span class="text-muted fw-bold d-block mt-1">HTML, CSS Coding</span>
                            </td>
                            <td class="">
                            </td>
                            <td class="text-end">
                                <span class="text-gray-800 fw-bolder d-block fs-6">$1,200,000</span>
                                <span class="text-muted fw-bold d-block mt-1 fs-7">Paid</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-bolder text-primary">+28%</span>
                            </td>
                            <td class="text-end pe-0">
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-primary btn-sm"><i class="bi bi-arrow-right"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-0 py-3">
                                <div class="mt-1 me-5">
                                    <span class="bg-ligth-primary align-items-end ">
                                        <img src="../uploaded/150876256_230079698764233_3511641179978773947_o.jpg" alt="" class="rounded rounded-3 img-fluid" style="max-height: 10vh;">
                                    </span>
                                </div>
                            </td>
                            <td class="px-0">
                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Brad Simmons</a>
								<span class="text-muted fw-bold d-block mt-1">HTML, CSS Coding</span>
                            </td>
                            <td class="">
                            </td>
                            <td class="text-end">
                                <span class="text-gray-800 fw-bolder d-block fs-6">$1,200,000</span>
                                <span class="text-muted fw-bold d-block mt-1 fs-7">Paid</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-bolder text-primary">+28%</span>
                            </td>
                            <td class="text-end pe-0">
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-primary btn-sm"><i class="bi bi-arrow-right"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-0 py-3">
                                <div class="mt-1 me-5">
                                    <span class="bg-ligth-primary align-items-end ">
                                        <img src="../uploaded/150876256_230079698764233_3511641179978773947_o.jpg" alt="" class="rounded rounded-3 img-fluid" style="max-height: 10vh;">
                                    </span>
                                </div>
                            </td>
                            <td class="px-0">
                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Brad Simmons</a>
								<span class="text-muted fw-bold d-block mt-1">HTML, CSS Coding</span>
                            </td>
                            <td class="">
                            </td>
                            <td class="text-end">
                                <span class="text-gray-800 fw-bolder d-block fs-6">$1,200,000</span>
                                <span class="text-muted fw-bold d-block mt-1 fs-7">Paid</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-bolder text-primary">+28%</span>
                            </td>
                            <td class="text-end pe-0">
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-primary btn-sm"><i class="bi bi-arrow-right"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-0 py-3">
                                <div class="mt-1 me-5">
                                    <span class="bg-ligth-primary align-items-end ">
                                        <img src="../uploaded/150876256_230079698764233_3511641179978773947_o.jpg" alt="" class="rounded rounded-3 img-fluid" style="max-height: 10vh;">
                                    </span>
                                </div>
                            </td>
                            <td class="px-0">
                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">Brad Simmons</a>
								<span class="text-muted fw-bold d-block mt-1">HTML, CSS Coding</span>
                            </td>
                            <td class="">
                            </td>
                            <td class="text-end">
                                <span class="text-gray-800 fw-bolder d-block fs-6">$1,200,000</span>
                                <span class="text-muted fw-bold d-block mt-1 fs-7">Paid</span>
                            </td>
                            <td class="text-end">
                                <span class="fw-bolder text-primary">+28%</span>
                            </td>
                            <td class="text-end pe-0">
                                <a href="#" class="btn btn-icon btn-bg-light btn-active-primary btn-sm"><i class="bi bi-arrow-right"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </main>
    <?php include "./../includes/script.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="./../js/untils.js"></script>
    <script>
		var lineChartData = {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'Evolution des absences',
				borderColor: window.chartColors.red,
				backgroundColor: window.chartColors.red,
				fill: false,
				data: [
					35,
					30,
					3,
					31,
					37,
					39,
					33
				],
				yAxisID: 'y-axis-1',
			}, {
				label: 'Evolution des présences',
				borderColor: window.chartColors.blue,
				backgroundColor: window.chartColors.blue,
				fill: false,
				data: [
					5,
					10,
					27,
					9,
					3,
					1,
					7
				]
			}]
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = Chart.Line(ctx, {
				data: lineChartData,
				options: {
					responsive: true,
                    maintainAspectRatio: false,
					hoverMode: 'index',
					stacked: false,
					title: {
						display: true,
						text: 'Chart.js Line Chart - Multi Axis'
					},
					scales: {
						yAxes: [{
							type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
							display: true,
							position: 'left',
							id: 'y-axis-1',
						}
                        // , {
						// 	type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
						// 	display: true,
						// 	position: 'right',
						// 	id: 'y-axis-2',

						// 	// grid line settings
						// 	gridLines: {
						// 		drawOnChartArea: false, // only want the grid lines for one axis to show up
						// 	},
						// }
                    ],
					}
				}
			});
		};
	</script>
    <script src="./../js/teacher.js"></script>
</body>
</html>
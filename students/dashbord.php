<?php
    require "./../includes/db.php";
    include "./../includes/function.php";

    session_start();
    if (!isset($_SESSION['idUser'])){
      header("location:../");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "./../includes/styles.php" ?>
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Tableau de bord</title>
</head>
<body class=" px-5 " style="background-color: #f7f9fc;">
    <main class="container-fluid pb-5">
        <div class="row mt-3">
                <div class="col-4 mt-1">
                    <section class="d-flex align-items-center px-1 bg-white  bg-light-success rounded rounded-3" style="height: 15vh;">
                        <p class="fs-3">Signer presence</p>
                    </section>
                </div>
                <div class="col-4   mt-1">
                    <section class="d-flex align-items-center px-1 bg-white rounded rounded-3   bg-light-warning" style="height: 15vh;">
                        <p class="fs-3 fw-2 text-warning">Nombre d'absence </p>
                    </section>
                </div>
                <div class="col-4 mt-1">
                    <section class="d-flex align-items-center  justify-content-around px-1  border bg-white rounded container rounded-3" style="height: 15vh;">
                        <div class="bg-secondary rounded-circle" style="height: 9vh; width: 9vh;"></div>    
                        <span class="fs-3  border">Michel KOYA</span>
                         
                    </section>
                </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-7 mt-1">
            <div class="row mt-1 mb-3">
                <div class="col-12  px-2">  
                    <div class="px-1 bg-white shadow-sm rounded rounded-3 "    style="overflow-y: overlay; width:  100%; height:75vh;">
                        <div class="row pt-2 table-responsive mx-2 align-items-center">
                        <?php
                            /**
                             * traitement pour recuperer les informations sur sa participation au cours
                             */
                            $idStudent = $_SESSION['idUser'];
                            $sql = "SELECT p.numParticiper, p.statutParticiper, p.motifParticiper, c.idProfesseur,c.dateCours, c.heuredebutCours, c.heuredefinCours FROM etudiant as e INNER JOIN participer AS p ON e.idStudent=p.idStudent RIGHT JOIN cours as c ON c.idCours = p.idcours WHERE e.idStudent =:idStudent OR e.idStudent IS NULL";
                            $data =[
                                'idStudent' => $idStudent
                            ];
                            $students = $pdo->prepare($sql);
                            $students->execute($data);
                            $students= $students->fetchAll(PDO::FETCH_OBJ);
                        ?>
                            <table class="table table-borderless align-middle">
                                <thead></thead>
                                <tbody>
                                <?php 
                                    foreach ($students as $s) {
                                ?>
                                    <tr>
                                        <td></td>
                                        <td class="">
                                            <?php
                                                switch (@$s->statutParticiper) {
                                                    case 1:
                                                        echo '<div class="text-center me-2 bg-light-success p-3 rounded-3"  >
                                                        <span class="bg-ligth-primary align-items-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                                                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                            </svg>
                                                        </span>
                                                    </div>';
                                                        break;
                                                    case 2:
                                                            echo '<div class="text-center me-2 bg-light-warning p-3 rounded-3"  >
                                                            <span class="bg-ligth-primary align-items-end">
                                                            <i class="bi bi-calendar2-minus" style="font-size: 24px;"></i>
                                                            </span>
                                                        </div>';
                                                            break;
                                                            default:
                                                            echo '<div class="text-center me-2 bg-light-danger p-3 rounded-3"  >
                                                            <span class="bg-ligth-primary align-items-end" width="25" height="25">
                                                                <i class="bi bi-calendar-x" style="font-size: 24px;"></i>
                                                            </span>
                                                        </div>';
                                                            break;
                                                        }
                                                        ?>
                                                    
                                                    
                                        </td>
                                        <td class="px-0">
                                            <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6"><?php echo  $date = dateToFrench($s->dateCours, 'l j F Y');  ?></a>
                                            <span class="text-muted fw-bold d-block mt-1"><?php echo   date("H \H i \m\i\\n", strtotime($s->heuredebutCours)); echo ' , ';echo   date("H \H i \m\i\\n", strtotime($s->heuredefinCours))  ?></span>
                                        </td>
                                        <td class="">
                                        </td>
                                        <td class="">
                                        </td>
                                        <td class="text-end">
                                            <span class="text-gray-800 fw-bolder d-block fs-6">
                                            <?php
                                                switch (@$s->statutParticiper) {
                                                    case 1:
                                                        echo 'Présent';
                                                        break;
                                                    case 2:
                                                        echo 'Absent avec justification';
                                                        break;
                                                    default:
                                                        echo 'Absent sans justification';
                                                        break;
                                                }
                                            ?>
                                            </span>
                                            <span class="text-muted fw-bold d-block mt-1 fs-7">Voir</span>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
            </div>
            <div class="col-12 col-lg-5  px-2">
                <div class="d-flex flex-column justify-content-center align-items-center px-1 bg-white shadow-sm rounded rounded-3"  style="height: 75vh;">
                        <div class="p-1" style="width: 100%;height: 75vh">
                            <canvas id="canvas"></canvas>
                        </div>
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
    <script src="./../js/students.js"></script>
</body>
</html>
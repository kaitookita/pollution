$(document).ready(function(){
			var $pc = $('#progressController');
			var $pCaption = $('.progress-bar p');
			var iProgress = document.getElementById('inactiveProgress');
			var aProgress = document.getElementById('activeProgress');
			var iProgressCTX = iProgress.getContext('2d');

			
			drawInactive(iProgressCTX);
			
			$pc.on('change', function(){
				var percentage = $(this).val() / 100;
				console.log(percentage + '%');
				drawProgress(aProgress, percentage, $pCaption);
			});

			function drawInactive(iProgressCTX){
				iProgressCTX.lineCap = 'square';

				//outer ring
				iProgressCTX.beginPath();
				iProgressCTX.lineWidth = 15;
				iProgressCTX.strokeStyle = '#e1e1e1';
				iProgressCTX.arc(137.5,137.5,129,0,2*Math.PI);
				iProgressCTX.stroke();

				//progress bar
				iProgressCTX.beginPath();
				iProgressCTX.lineWidth = 0;
				iProgressCTX.fillStyle = '#e6e6e6';
				iProgressCTX.arc(137.5,137.5,121,0,2*Math.PI);
				iProgressCTX.fill();

				//progressbar caption
				iProgressCTX.beginPath();
				iProgressCTX.lineWidth = 0;
				iProgressCTX.fillStyle = '#fff';
				iProgressCTX.arc(137.5,137.5,100,0,2*Math.PI);
				iProgressCTX.fill();

			}
			function drawProgress(bar, percentage, $pCaption){
				var barCTX = bar.getContext("2d");
				var quarterTurn = Math.PI / 2;
				var endingAngle = ((2*percentage) * Math.PI) - quarterTurn;
				var startingAngle = 0 - quarterTurn;

				bar.width = bar.width;
				barCTX.lineCap = 'square';
				var color = '#0079d7'
				if($pc.val() == 0)
				{
					var word = "vision"
					$pCaption.text( word);
				}
				else if($pc.val()>0 && $pc.val() <=20)
				{
					var color = '#ff0031'
					$pCaption.text( (parseInt(percentage * 100, 10)) + 'เมตร');
					
				}
				else if($pc.val()>20 && $pc.val() <=40)
				{
					
					var color = '#ff7e4b'
					$pCaption.text( (parseInt(percentage * 100, 10)) + 'เมตร');
				}
				else if($pc.val()>40 && $pc.val() <=60)
				{
					
					var color = '#e9d252'
					$pCaption.text( (parseInt(percentage * 100, 10)) + 'เมตร');
				}
				else if($pc.val()>60 && $pc.val() <=80)
				{
					
					var color = '#00b03c'
					$pCaption.text( (parseInt(percentage * 100, 10)) + 'เมตร');
				}
				else
				{
					var color = '#1f8ed2'
					$pCaption.text( (parseInt(percentage * 100, 10)) + 'เมตร');
				}
				

				barCTX.beginPath();
				barCTX.lineWidth = 20;
				barCTX.strokeStyle = color;
				barCTX.arc(137.5,137.5,111,startingAngle, endingAngle);
				barCTX.stroke();
				
			}

				var percentage = $pc.val() / 100;
				drawProgress(aProgress, percentage, $pCaption);

			
		});
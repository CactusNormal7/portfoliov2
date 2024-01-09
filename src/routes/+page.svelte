<script>
	// @ts-ignore
	// let tittleunderline = [];

	// const enterTittleColor = () => {
	// 	for (let i = 0; i < tittleunderline.length; i++) {
	// 		// @ts-ignore
	// 		if (i === 0) {
	// 			// @ts-ignore
	// 			tittleunderline[i].style.width = '40%';
	// 		} else {
	// 			// @ts-ignore
	// 			tittleunderline[i].style.width = '100%';
	// 		}
	// 	}
	// };
	// const leaveTittleColor = () => {
	// 	for (let i = 0; i < tittleunderline.length; i++) {
	// 		// @ts-ignore
	// 		tittleunderline[i].style.width = '0%';
	// 	}
	// };
</script>

<body>
	<div id="AllContainer">
		<div id="tittleSection">
			<!-- <div id="circle1"></div> -->
			<div style="padding-top: 25px;">
				<h1 class="tittleText" id="tittleText" style="width: fit-content;">Hi, i'm Jules,</h1>
				<h1 class="tittleText">a student in web developpement</h1>
			</div>
		</div>
	</div>
</body>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;500&display=swap');

	body {
		padding: 0;
		margin: 0;
	}

	#tittleSection {
		widows: 100%;
		position: relative;
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	#circle1 {
		position: absolute;
		background-color: white;
		top: -20%;
		width: 400px;
		left: 15%;
		height: 400px;
		border-radius: 100%;
		mix-blend-mode: difference;
	}

	#AllContainer {
		display: flex;
		flex-direction: column;
		width: 100vw;
		height: 100vh;
		background-color: black;
	}

	.tittleText {
		margin-bottom: 0;
		margin-top: 0;
		border-bottom: 5px solid black;
		color: white;
		position: relative;
		font-weight: bolder;
		padding: 0px 10px 0px 10px;
		transition: 0.5s;
		animation: 0.8s ease titteComing;
		font-family: 'Roboto', sans-serif;
		font-size: 60px;
	}

	.tittleText:after {
		content: '';
		position: absolute;
		width: 100%;
		height: 8px;
		background-color: white; /* Couleur du soulignement */
		bottom: 0;
		left: 0;
		transform: translateY(10px);
		transform-origin: right;
		transition: transform 0.3s ease;
		animation: 1s ease tittleunderline;
	}

	@keyframes titteComing {
		0% {
			transform: translateY(-200px);
		}

		100% {
			transform: translateY(0px);
		}
	}

	@keyframes tittleunderline {
		0% {
			width: 0;
		}

		100% {
			width: 100;
		}
	}

</style>

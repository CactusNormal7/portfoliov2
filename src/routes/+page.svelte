<script>
	// @ts-ignore

	let tittleText = [];

	const enterTittleColor = () => {
		for (let i = 0; i < tittleText.length; i++) {
			// @ts-ignore
			tittleText[i].style.borderBottom = '14px solid white';
        }
	};

	const leaveTittleColor = () => {
		for (let i = 0; i < tittleText.length; i++) {
			// @ts-ignore
            tittleText[i].style.borderBottom = '8px solid black';
		}
	};
</script>

<body>
	<div id="AllContainer">
		<div id="tittleSection">
			<!-- <div id="circle1"></div> -->
			<div style="padding-top: 25px;">
				<h1
					bind:this={tittleText[0]}
					on:mouseenter={enterTittleColor}
					on:mouseleave={leaveTittleColor}
					class="tittleText"
					style="width: fit-content;"
				>
					Hi, i'm Jules,
				</h1>
				<h1
					bind:this={tittleText[1]}
					on:mouseenter={enterTittleColor}
					on:mouseleave={leaveTittleColor}
					class="tittleText"
				>
					a student in web developpement
				</h1>
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
		font-weight: bolder;
		padding: 0px 10px 0px 10px;
		transition: 0.5s;
		animation: 0.5s ease-in-out test;
		font-family: 'Roboto', sans-serif;
		font-size: 60px;
	}

	@keyframes test {
		0% {
			transform: translateY(-200px);
		}

		100% {
			transform: translateY(0px);
		}
	}
</style>

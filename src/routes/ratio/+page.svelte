<script>
	// @ts-nocheck

	let currentSection = 0;
	const sections = [];

	const handleScroll = (e) => {
		e.preventDefault();

		if (e.deltaY > 0 && currentSection < sections.length - 1) {
			currentSection++;
		} else if (e.deltaY < 0 && currentSection > 0) {
			currentSection--;
		}

		scrollToSection(currentSection);
	};

	function scrollToSection(index) {
		const targetPosition = sections[index].offsetTop;
		window.scrollTo({
			top: targetPosition,
			behavior: 'smooth'
		});
	}
</script>

<body on:mousewheel={handleScroll}>
	<div class="section" id="sec1" bind:this={sections[0]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
	<div class="section" id="sec2" bind:this={sections[1]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
	<div class="section" id="sec3" bind:this={sections[2]}>
		<div class="MainTittleSection">
			<h1 id="mainTittle">WELCOME</h1>
		</div>
	</div>
</body>
<!-- 
----colors----

black : 141416


-->

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;500&display=swap');

	* {
		font-family: 'Roboto', sans-serif;
		padding: 0;
		margin: 0;
		overflow: hidden;
	}

	body {
		padding: 0;
		margin: 0;
	}

	.section {
		display: flex;
		width: 100vw;
		height: 100vh;
		justify-content: center;
		align-items: center;
	}

	#sec1 {
		background-color: #141416;
	}

	#sec2 {
		background-color: white;
	}

	#sec3 {
		background-color: black;
	}

	#mainTittle {
		font-size: 200px;
		color: white;
		animation: tracking-in-expand 1s ease forwards, mainText 3.3s;
		margin: 0;
		margin-bottom: 100px;
	}

	.MainTittleSection {
		display: flex;
	}

	@-webkit-keyframes tracking-in-expand {
		0% {
			letter-spacing: -0.5em;
			opacity: 0;
		}
		40% {
			opacity: 0.6;
		}
		100% {
			opacity: 1;
		}
	}
	@keyframes tracking-in-expand {
		0% {
			letter-spacing: -0.5em;
			opacity: 0;
		}
		40% {
			opacity: 0.6;
		}
		100% {
			opacity: 1;
		}
	}
</style>

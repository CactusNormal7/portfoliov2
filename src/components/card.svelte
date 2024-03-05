<!-- MyComponent.svelte -->
<script>
	// @ts-nocheck

	export let first = 'first';
	export let second = 'second';

	let expandedSection;

	let expanded = false;

	function toggleExpanded() {
		expanded = !expanded;
	}

	function modifyExpand() {
		if (expanded) {
			// @ts-ignore
			expandedSection.style.width = '500px';
		} else {
			// @ts-ignore
			expandedSection.style.width = '0px';
		}
	}
</script>

<!-- svelte-ignore a11y-no-static-element-interactions -->
<!-- <div id="containerAll" on:mouseleave={() => {expanded = false}} on:mouseleave={modifyExpand}> -->
<div id="containerAll">
	<div class="card">
		<div class="first-content">
			<span id="firstspan">{first}</span>
			<button on:click={toggleExpanded} on:click={modifyExpand} id="viewMore">view more</button>
		</div>
		<!-- <div class="second-content">
		</div> -->
	</div>
	<div bind:this={expandedSection} id="expandedSection" />
</div>

<!-- 
----colors----

black : 141416
grey : 2f2f31

-->

<style>
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;500&display=swap');

	* {
		font-family: 'Roboto', sans-serif;
	}

	.card {
		width: 190px;
		height: 254px;
		color: #2f2f31;
		background: #141416;
		transition: all 0.4s;
		border: 2px solid #2f2f31;
		border-radius: 10px;
		/* text-shadow: 10px 10px #141416; */
		font-size: 30px;
		font-weight: 900;
	}

	#firstspan {
		max-width: 70%;
	}

	.card:hover {
		border-radius: 15px;
		z-index: 18;
		cursor: pointer;
		transform: scale(1.1);
		border-color: white;
		color: #2f2f31;
		text-shadow: none;
		box-shadow: 12px 12px 0px 0px #2f2f31;
	}

	.first-content {
		height: 100%;
		position: relative;
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		opacity: 1;
		border-radius: 15px;
	}

	.card:hover .first-content {
		/* visibility: hidden; */
		/* height: 0%; */
		color: white;
		/* transition: 0s; */
		/* opacity: 0; */
	}

	.card:hover #viewMore {
		visibility: visible;
	}

	#expandedSection {
		background-color: red;
		width: 0;
		height: 120%;
		transition: width 0.4s ease;
	}

	button {
		text-decoration: none;
	}

	#viewMore {
		visibility: hidden;
		position: absolute;
		bottom: 10%;
		padding: 5px 10px 5px 10px;
		border-radius: 0px;
		width: 47%;
		font-family: 'Roboto', sans-serif;
		color: white;
		border: 1px solid white;
		background-color: #141416;
		font-weight: bolder;
		transition: 0.3s, visibility 0s;
	}

	#viewMore:hover {
		width: 49%;
		background-color: white;
		color: #2f2f31;
	}

	#containerAll {
		display: flex;
		width: fit-content;
	}

	/* 
	.descSection {
		width: 80%;
	}

	.second-content {
		height: 100%;
		width: 100%;
		opacity: 0;
		visibility: hidden;
		display: flex;
		justify-content: center;
		flex-direction: column;
		gap: 20px;
		align-items: center;
		transition: 0s;
		color: white;
		border-radius: 15px;
		transition: all 0.4s;
		font-size: 0.7rem;
	}
	.card:hover .second-content {
		visibility: visible; 
		opacity: 1; 
		height: 100%; 
	} 
	 */
</style>

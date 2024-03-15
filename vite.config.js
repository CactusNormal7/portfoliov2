import { sveltekit } from '@sveltejs/kit/vite';
import { defineConfig, searchForWorkspaceRoot } from 'vite'

export default defineConfig({
	server : {
		fs : {
			allow : [
				searchForWorkspaceRoot(process.cwd()),
				'**/static/**',
				'**/static/laravel-2.svg'
			]
		}
	},
	plugins: [sveltekit()]
});

require 'capistrano/ext/multistage'
load 'deploy'
	
#set :application, "uxwordpress"
#set(:repository) { "git@git301p.prod.ch3.s.com:uxwpress.git" }
	
##### SOURCE CONTROL #####
set :scm, :git
	
##### DEPLOYMENT #####
#set(:user) { "stateadm" }
#set(:deploy_to) { "/opt/stateapps/uxwpress" }
set :deploy_via, :remote_cache
#set :branch, "#{:appBranch}"
set :use_sudo, false
	
namespace :deploy do
	
	desc "A macro-task that updates the code and fixes the symlink."
	task :default do
		transaction do
			update_code
			symlink
		end
	end

	task :update_code, :except => { :no_release => true } do
		on_rollback { run "rm -rf #{release_path}; true" }
		strategy.deploy!
	end
		
	task :after_deploy do
		cleanup
	end

	task :after_symlink do
	end
end

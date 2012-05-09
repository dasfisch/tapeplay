require 'capistrano/ext/multistage'
load 'deploy'

##### SOURCE CONTROL #####
set :scm, :git

##### DEPLOYMENT #####
set :deploy_via, :remote_cache
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
    move_deploy
  end

  task :after_symlink do
  end
end

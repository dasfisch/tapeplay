#testing something on qa
set(:user) { "tapeplayer" }

ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "tapeplayer")]

set(:domain) { "ec2-23-23-87-163.compute-1.amazonaws.com" }
set(:application) { "tapeplay" }
set(:repository) { "ssh://git@barable.com:30000/home/git/repos/tapeplay.git" }

set(:keep_releases) {1}

##### APPLICATION #####
role :web, "#{domain}"  # Your HTTP server, Apache/etc
role :app, "#{domain}"  # This may be the same as your `Web` server
role :db, domain, :primary => true

#set (:branch) { "development" }
set (:branch) { "integration" }
set (:deploy_to) { "/home/tapeplayer/tapeplay" }
set :deploy_via, :copy

set :move_deploy do
    run "rm -rf /apps/beta/www/* && cp -R /home/tapeplayer/tapeplay/current/* /apps/beta/www/"
    run "mkdir /apps/beta/www/_smarty/_templates_c/ /apps/beta/www/_smarty/_configs/ /apps/beta/www/_smarty/_cache/ /apps/beta/www/_smarty/_configs/"
    run "cp /etc/config/tapeplay/smarty/smarty.conf /apps/beta/www/_smarty/_configs/"
end

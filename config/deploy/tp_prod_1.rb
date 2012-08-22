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

set (:branch) { "integration" }
set (:deploy_to) { "/home/tapeplayer/tapeplay" }
set :deploy_via, :copy

set :move_deploy do
    run "cp -R /home/tapeplayer/tapeplay/current/* /apps/beta/www/"
end

#testing something on qa
set(:user) { "tapeplayer" }

ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "tapeplayer")]

set(:domain) { "ec2-50-19-56-168.compute-1.amazonaws.com" }
set(:application) { "tapeplay" }
set(:repository) { "ssh://git@barable.com:30000/home/git/repos/tapeplay.git" }

set(:keep_releases) {1}

##### APPLICATION #####
role :web, "#{domain}"  # Your HTTP server, Apache/etc
role :app, "#{domain}"  # This may be the same as your `Web` server
role :db, domain, :primary => true

set (:branch) { "development" }
set (:deploy_to) { "/apps/tapeplay/www" }
set :deploy_via, :copy

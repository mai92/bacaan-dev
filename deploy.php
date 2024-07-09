<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config
set('nvm', 'source $HOME/.nvm/nvm.sh');

task('build', function () {
    cd('{{release_path}}');
    run('npm install');
    run('npm run build');
});

set('repository', 'https://github.com/mai92/bacaan-dev.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts
host('103.127.133.35')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '  /var/www/sayamirul.com');

// Hooks
after('deploy', 'build');
after('deploy:failed', 'deploy:unlock');

Vagrant.configure(2) do |config|
    config.vm.box = "DJenkinsDev/VagrantPHP"
    config.vm.network "forwarded_port", guest: 3306, host: 3307
    config.vm.network "private_network", ip: "192.168.56.2"
end

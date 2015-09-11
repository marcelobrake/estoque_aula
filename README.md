# README #

Este arquivo se faz necessário para instruir outras pessoas dos procedimentos de instalação e utilização de sua aplicação, além de informações úteis sobre versão e recursos que sua aplicação oferece.
No projeto, este arquivo é nomeado como README.md e aparece na página inicial do GITHUB ou BITBUCKET com todos os detalhes da aplicação em questão.

### Comandos básicos do Vagrant ###

#### Criar uma VM ####

* Abra um terminal (prompt de comando no Windows)
* Vá até o diretório onde ficará seu projeto (cd ~/Documentos/estoque-aula)
* Crie o ambiente com o comando: vagrant init DJenkinsDev/VagrantPHP

No comando acima, a expressão "DJenkinsDev/VagrantPHP" corresponde ao box utilizado, ou seja, uma máquina virtual criada e disponibilizada online para ser baixada em sua máquina.

* Inicie a VM com o comando: vagrant up

* Para acessar a máquina via SSH, utilize o Putty, conectando no host 127.0.0.1 na porta 2222 ou vagrant ssh

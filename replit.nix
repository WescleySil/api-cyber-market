{ pkgs }: {
  deps = [
    pkgs.sqlite
    pkgs.mysql80
    pkgs.php83Packages.composer
    pkgs.cowsay
    pkgs.php83
  ];
}
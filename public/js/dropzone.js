Dropzone.options.changeAvatar = {
    paramName: "photo",
    maxFilesize: 1,
    acceptedFiles: '.jpg, .jpeg, .png, .bmp',
    maxFiles: 1,
    init: function() {
        this.on('maxfilesexceeded', function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });
    }
};

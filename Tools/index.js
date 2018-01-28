const fs = require("fs");
const _ = require("lodash");

fs.readFile("../.all-contributorsrc", (err, data) => {
	if (err) throw err;
	data = JSON.parse(data);
	data.contributors = _.sortBy(data.contributors, "name");
	fs.writeFile("../.all-contributorsrc", `${JSON.stringify(data, null, 2)}\n`, (err) => {
		if (err) throw err;
		console.log("Saved to `../.all-contributorsrc`");
	});
});

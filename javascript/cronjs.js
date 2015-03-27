var jsCron = {
		items:[],
		interval: null,
		parse: function(strUnix) {
				return strUnix.match(/^(\d+|\*) (\d+|\*) (\d+|\*) (\d+|\*) (\d|\*) +(\w+)/);
		},
		check: function() {
				var hoy = new Date();
				var test = [new Date(), hoy.getMinutes(), hoy.getHours(), hoy.getDate(), hoy.getMonth(), hoy.getDay()];

				for (var i in this.items) {
					var exec = 0;
					var t = this.parse(this.items[i][1]);
					for (var x in t)
				    if (t[x] && (t[x] == test[x] || t[x] == "*"))exec++;
					if (exec == 5 && this.items[i][0] == 0) {
							eval(t[6]).call();
							this.items[i][0] = 1;
					} else if (exec < 5 && this.items[i][0] == 1) {
						this.items[i][0] = 0;
					}
				}
		},
		set: function(strUnix) {
			if (!/^(\d+|\*) (\d+|\*) (\d+|\*) (\d+|\*) (\d|\*) +(\w+)/.test(strUnix)) return new Error("Formato invalido");
			this.items.push([0, strUnix]);
		},
		init: function(seg) {
			var seg = seg || 1000;
			this.interval = setInterval("jsCron.check()", seg);
		}
};
jsCron.init();
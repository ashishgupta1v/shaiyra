const fs = require('fs');
const path = require('path');

function walk(dir) {
  let results = [];
  const list = fs.readdirSync(dir);
  list.forEach(file => {
    file = path.join(dir, file);
    const stat = fs.statSync(file);
    if (stat && stat.isDirectory()) {
      results = results.concat(walk(file));
    } else if (file.endsWith('.vue')) {
      results.push(file);
    }
  });
  return results;
}

const files = walk('resources/js');
files.forEach(file => {
  let content = fs.readFileSync(file, 'utf8');
  let original = content;

  // 1. Remove NavBar inverted prop
  content = content.replace(/<NavBar\s+inverted\s*\/>/g, '<NavBar />');
  content = content.replace(/<NavBar\s+inverted=\"true\"\s*\/>/g, '<NavBar />');
  content = content.replace(/<NavBar\s+inverted\s*>/g, '<NavBar>');

  // 2. Replace v-magnetic
  // Case A: v-magnetic is before class="..."
  content = content.replace(/v-magnetic(\s+.*?)class="([^"]*)"/g, '$1class="$2 transition-transform hover:scale-105 active:scale-95"');
  
  // Case B: v-magnetic is after class="..."
  content = content.replace(/class="([^"]*)"(\s+.*?)v-magnetic/g, 'class="$1 transition-transform hover:scale-105 active:scale-95"$2');
  
  // Case C: v-magnetic without class (we do a rough replacement that adds class="...")
  // This is safe because if it had a class, it would have been matched by A or B.
  content = content.replace(/\s+v-magnetic/g, ' class="transition-transform hover:scale-105 active:scale-95"');

  if (content !== original) {
    fs.writeFileSync(file, content);
    console.log('Updated', file);
  }
});

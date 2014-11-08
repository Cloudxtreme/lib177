<?php
namespace Explore;
function QueryExplore($action, $project, $stock, $name, $distant)
{
  \Program::load('Explore');
  
  $src = '../';
  if(!empty($project))
    $src = '../'.$project.'/';
  if(!empty($stock))
    $src .= str_replace(',', '/', $stock).'/';
    
  switch($action)
  {
    case 'copy':
        \Explore\copyFile($src, $project, $stock, $name, $distant);
    break;
    case 'createFolder':
        \Explore\create($src, $project, $stock, $name, 'dir');
    break;
    case 'createPage':
        \Explore\create($src, $project, $stock, $name);
    break;
    case 'createAtomePage':
        \Explore\create($src, $project, $stock, $name, 'atm');
    break;
    case 'createAutoloadPage':
        \Explore\create($src, $project, $stock, $name, 'atl');
    break;
    case 'createCfgPage':
        \Explore\create($src, $project, $stock, $name, 'cfg');
    break;
    case 'createCssPage':
        \Explore\create($src, $project, $stock, $name, 'css');
    break;
    case 'createHtaccessPage':
        \Explore\create($src, $project, $stock, $name, 'hta');
    break;
    case 'createMVCPages':
        \Explore\create($src, $project, $stock, $name, 'mvc');
    break;
    case 'delete':
        \Explore\delete($src, $project, $stock, $name, 'file');
    break;
    case 'deleteDir':
        \Explore\delete($src, $project, $stock, $name, 'dir');
    break;
    case 'deleteMVC':
        \Explore\delete($src, $project, $stock, $name, 'mvc');
    break;
    case 'deplace':
        \Explore\deplace($src, $project, $name, $distant, $stock);
    break;
    case 'deplaceMVC':
        \Explore\deplace($src, $project, $stock, $name, $distant, 'mvc');
    break;
    case 'listProject':
        return \Explore\listProject();
    break;
    case 'open':
        \Explore\openFile($src, $project, $stock, $name);
    break;
    case 'openMVC';
        \Explore\openFile($src, $project, $stock, $name, 'mvc');
    break;
    case 'mvcOne';
        \Explore\openFile($src, $project, $stock, $name, 'mvcOne');
    break;
    case 'propage';
        \Explore\propage($src, $project, $stock, $name);
    break;
    case 'see':
        return \Explore\see($src, $project, $stock);
    break;
    case 'slide':
        return \Explore\slide();
    break;
    default:
        \Error::brut('Unknown action.');
  }
	header('Location: explore-see-'.$project.'-'.$stock.'-0');
	die;
}
?>
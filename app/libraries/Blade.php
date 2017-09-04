<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blade
{

    public function __construct()
    {
        $this->_ci = get_instance();
        $path = [
            VIEWPATH,
            VIEWPATH . $this->_ci->config->item('frontend_theme') . 'views',
        ];
        $this->loadModules($path);
        $cachePath = '../storage/views'; // 编译文件缓存目录

        $file = new \Xiaoler\Blade\Filesystem;
        $compiler = new \Xiaoler\Blade\Compilers\BladeCompiler($file, $cachePath);
        $finder = new \Xiaoler\Blade\FileViewFinder($file, $path);
        // $finder->addExtension('php');

        // you can add a custom directive if you want
        $compiler->directive('datetime', function($timestamp) {
            return preg_replace('/(\(\d+\))/', '<?php echo date("Y-m-d H:i:s", $1); ?>', $timestamp);
        });
        $resolver = new \Xiaoler\Blade\Engines\EngineResolver;
        $resolver->register('blade', function () use ($compiler) {
            return new \Xiaoler\Blade\Engines\CompilerEngine($compiler);
        });
        $resolver->register('php', function () use ($compiler) {
            return new \Xiaoler\Blade\Engines\CompilerEngine($compiler);
        });
        // 如果需要添加自定义的文件扩展，使用以下方法

        // 实例化 Factory
        $this->factory = new \Xiaoler\Blade\Factory($resolver, $finder);
        $this->factory->addExtension('tpl', 'blade');

        // $this change to _ci
        $this->share('_ci', $this->_ci);
    }

    private function loadModules(&$path)
    {
        // Include routes every modules
        $modules_locations = config_item('modules_locations') ? config_item('modules_locations') : FALSE;
        if(!$modules_locations)
        {
            $modules_locations = APPPATH . 'modules/';
            if(is_dir($modules_locations))
            {
                $modules_locations = array($modules_locations => '../modules/');
            }
            else
            {
                show_error('Modules directory not found');
            }
        }

        foreach ($modules_locations as $key => $value)
        {
            if ($handle = opendir($key))
            {
                while (false !== ($entry = readdir($handle)))
                {
                    if ($entry != "." && $entry != "..")
                    {
                        if(is_dir($key.$entry.'/views'))
                        {
                            $path[] = $key.$entry.'/views';
                        }
                    }
                }
                closedir($handle);
            }
        }
    }

    public function view($path, $vars = [])
    {
        echo $this->factory->make($path, $vars);
    }

    public function exists($path)
    {
        return $this->factory->exists($path);
    }

    public function share($key, $value)
    {
        return $this->factory->share($key, $value);
    }

    public function render($path, $vars = [])
    {
        return $this->factory->make($path, $vars)->render();
    }
}

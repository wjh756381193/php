set nocompatible              " 这是必需的，去除VI一致性
set number  				  " 设置行号
set ruler 					  " 设置标尺
set hlsearch 				  " 搜索高亮
set autoindent  			  " 自动缩进
set cindent                   " 设置C语言缩进格式
set expandtab				  " 设置tab键展开为四个空格
set shiftwidth=4              " 设置自动缩进
set ts=4					  " 设置tab键有多少个空格
set noeb                      " 关闭提示音      
set vb t_vb=                  " 关闭提示音
set conceallevel = 3

" 设置编码    
set encoding=UTF-8    
set fileencodings=ucs-bom,utf-8,cp936,gb2312,gb18030,big5 

set transparency=6           " 设置透明度

set ambiwidth=double          " 防止特殊符号无法正常显示
"set guifont=Chalkboard:h16   " 设置字体
" set guifont=Monaco:h16        " 设置字体
" set guifont=DroidSansMonoNerdFontComplete:h16        " 设置字体
set guifont=DroidSansMono_Nerd_Font:h16

colorscheme monokai           " 设置主题
set smarttab                  " 按一次backspace就删除4个空格
set guioptions-=r             " 关闭右侧滚动条
set guioptions-=L             " 关闭右侧滚动条
" set guioptions-=b             " 关闭右侧滚动条
" set guioptions-=a             " 关闭右侧滚动条
" set guifont=Courier_New:h16
" autocmd vimenter * silent NERDTree
autocmd FileType java setlocal omnifunc=javacomplete#Complete
" autocmd BufWritePost $MYVIMRC source $MYVIMRC " 让配置变更直接生效
"

" syntax enable
map <C-n> :silent NERDTreeToggle<CR>
set rtp+=~/.vim/bundle/Vundle.vim

let g:NERDTreeDirArrowExpandable = '▸'
" let g:NERDTreeDirArrowExpandable = '►'
" let g:NERDTreeDirArrowExpandable = '+'
let g:NERDTreeDirArrowCollapsible = '▾'
" let g:NERDTreeDirArrowCollapsible = '▼'
" let g:NERDTreeDirArrowCollapsible = '-'
let NERDTreeIgnore=['\.pyc','\~$','\.swp']
let g:NERDTreeIndicatorMapCustom = {
    \ "Modified"  : "✹",
    \ "Staged"    : "✚",
    \ "Untracked" : "✭",
    \ "Renamed"   : "➜",
    \ "Unmerged"  : "=",
    \ "Deleted"   : "✖",
    \ "Dirty"     : "✗",
    \ "Clean"     : "✔︎",
    \ 'Ignored'   : '☒',
    \ "Unknown"   : "?"
    \ }
let g:NERDTreeShowIgnoredStatus = 1

" 插件引入开始
call vundle#begin()  

" 让vundle管理插件版本,必须。" 这应该始终是第一个
Plugin 'mhinz/vim-startify'
Plugin 'Xuyuanp/nerdtree-git-plugin'
Plugin 'VundleVim/Vundle.vim'
Plugin 'Valloric/YouCompleteMe'
Plugin 'scrooloose/nerdtree'
Plugin 'artur-shaik/vim-javacomplete2'
Bundle 'junegunn/vim-easy-align'
Plugin 'ervandew/supertab'
Plugin 'tiagofumo/vim-nerdtree-syntax-highlight'
Plugin 'vim-airline/vim-airline'
Plugin 'vim-airline/vim-airline-themes'
Plugin 'tpope/vim-fugitive'

" vim-devicons must be put at the end of plugin list 
Plugin 'ryanoasis/vim-devicons'

call vundle#end()            " 必须
" 插件引入结束

filetype plugin indent on


" Start interactive EasyAlign in visual mode (e.g. vipga)
xmap ga <Plug>(EasyAlign)
 
" Start interactive EasyAlign for a motion/text object (e.g. gaip)
nmap ga <Plug>(EasyAlign)

let g:SuperTabDefaultCompletionType=2

""""" 自动补全设置 """""
let g:ycm_global_ycm_extra_conf='~/.ycm_extra_conf.py'
let g:ycm_confirm_extra_conf = 0
let g:ycm_complete_in_comments = 1
let g:ycm_complete_in_strings = 1
let g:ycm_seed_identifiers_with_syntax = 1


""""" 语法检查配置 """""
let g:syntastic_error_symbol = '✗'      "set error or warning signs
let g:syntastic_warning_symbol = '⚠'
let g:syntastic_check_on_open=1
let g:syntastic_enable_highlighting = 0
let g:syntastic_python_checkers=['pyflakes'] " 使用pyflakes,速度比pylint快
let g:syntastic_javascript_checkers = ['jsl', 'jshint']
let g:syntastic_html_checkers=['tidy', 'jshint']
let g:syntastic_cpp_include_dirs = ['/usr/include/']
let g:syntastic_cpp_remove_include_errors = 1
let g:syntastic_cpp_check_header = 1
let g:syntastic_cpp_compiler = 'clang++'
let g:syntastic_cpp_compiler_options = '-std=c++11 -stdlib=libstdc++'
let g:syntastic_enable_balloons = 1 "whether to show balloons
highlight SyntasticErrorSign guifg=white guibg=black

" let g:SuperTabDefaultCompletionType = '<C-x><C-o>'

""""" 以下两行为光标行高亮
set cursorline
hi CursorLine cterm=NONE ctermbg=darkred ctermfg=black guibg=green guifg=black
""""" 以上两行为光标行高亮



"""""""""""""""""""""""""""""""""""""""""""""
"""""""devicons配置修改""""""""""""""""""""""
"""""""""""""""""""""""""""""""""""""""""""""

" loading the plugin
let g:webdevicons_enable = 1

" adding the flags to NERDTree
let g:webdevicons_enable_nerdtree=1

" adding the custom source to unite
let g:webdevicons_enable_unite = 1 

" adding the column to vimfiler
let g:webdevicons_enable_vimfiler = 1

" adding to vim-airline's tabline
let g:webdevicons_enable_airline_tabline = 1

" adding to vim-airline's statusline
let g:webdevicons_enable_airline_statusline = 1

" ctrlp glyphs
let g:webdevicons_enable_ctrlp = 1

" adding to vim-startify screen
let g:webdevicons_enable_startify = 1

" adding to flagship's statusline
let g:webdevicons_enable_flagship_statusline = 1

" turn on/off file node glyph decorations (not particularly useful)
let g:WebDevIconsUnicodeDecorateFileNodes = 0 

" use double-width(1) or single-width(0) glyphs
" only manipulates padding, has no effect on terminal or set(guifont) font
let g:WebDevIconsUnicodeGlyphDoubleWidth = 0 

" the amount of space to use after the glyph character (default ' ')
" let g:WebDevIconsNerdTreeAfterGlyphPadding = '' 
" let g:WebDevIconsNerdTreeBeforeGlyphPadding = ''

" Force extra padding in NERDTree so that the filetype icons line up vertically
let g:WebDevIconsNerdTreeGitPluginForceVAlign = 0

" Adding the custom source to denite
let g:webdevicons_enable_denite = 1

" whether or not to show the nerdtree brackets around flags
let g:webdevicons_conceal_nerdtree_brackets=1

""""""""""""""""""""""""""""""""  config airline

let g:airline#extensions#tabline#enabled = 1
let g:airline#extensions#tabline#formatter = 'default'
let g:airline#extensions#tabline#left_sep = ''
let g:airline#extensions#tabline#right_sep = ''
let g:airline#extensions#tabline#left_alt_sep  = ''
let g:airline#extensions#tabline#right_alt_sep = ''
let g:airline#extensions#tabline#show_close_button = 1
let g:airline#extensions#tabline#fnamemod = ':t'

let g:airline_theme = 'base16_brewer'
let g:airline_left_sep = ''
let g:airline_left_alt_sep = ''
let g:airline_right_sep = ''
let g:airline_right_alt_sep = ''
let g:airline_symbols.branch = ''
let g:airline_symbols.readonly = ''
let g:airline_symbols.linenr = '☰'
let g:airline_symbols.maxlinenr = ''
let g:airline_symbols.dirty='⚡'
let g:airline_section_b = '%{strftime("%c")}%'

let mapleader = ","
let g:mapleader = ","
nnoremap <Leader><Leader> :bp<CR>
nnoremap nt :bn<CR>

" syntax match hideBracketsInNerdTree "[\]|\[]*" conceal cchar=_
" set conceallevel=3
" set concealcursor=nvic


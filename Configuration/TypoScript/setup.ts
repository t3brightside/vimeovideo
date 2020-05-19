tt_content.vimeovideo_pi1 < tt_content.list.20.vimeovideo_contentrenderer
tt_content.vimeovideo_pi1.action = index

plugin.tx_vimeovideo {
	view < lib.contentElement
    view.templateRootPaths.10 = EXT:vimeovideo/Resources/Private/Templates/
	settings.defaultHeaderType = {$styles.content.defaultHeaderType}

    render {
       # wide screen 16:9 value (math behind: 9 * 100 / 16 = 56.25)

        ratioDefault = TEXT
        ratioDefault.value = 56.25

       # screen 4:3 value (math behind: 3 * 100 / 4 = 75)

        ratio1 = TEXT
        ratio1.value = 75

       # If you need more aspect ratios add em here and change Page TSConfig and HTML template accordingly.

        color= TEXT
        color.value = f60
        # hex value for color without leading '#'
    }
}

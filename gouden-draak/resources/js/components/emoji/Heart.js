window.updateFavoriteState = function (id, state) {
    let cookie = getCookieValue(consts.cookies.favoriteGerechten) ?? [];
    try {
        cookie = JSON.parse(cookie);
    } catch (e) {
        cookie = [];
    }

    cookie = cookie.filter(function (value) {
        return value !== id;
    });
    if (state) {
        cookie.push(id);
    }
    setCookie(consts.cookies.favoriteGerechten, JSON.stringify(cookie), 7);
}
